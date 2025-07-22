<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\AnaliseViabilidade;
use Barryvdh\DomPDF\Facade\Pdf;

class AnaliseViabilidadeController extends Controller
{


    public function gerarPdf($id)
    {
        $analise = \App\Models\AnaliseViabilidade::findOrFail($id);
        $sugestoes = json_decode($analise->sugestoes, true);
        $dataCriada = \Carbon\Carbon::parse($analise->created_at)->format('d/m/Y');

        $pdf = Pdf::loadView('analises.pdf', [
            'analise' => $analise,
            'sugestoes' => $sugestoes,
            'dataCriada' => $dataCriada
        ]);

        return $pdf->download('analise-viabilidade-' . $analise->id . '.pdf');
    }


public function index()
{
    $analises = AnaliseViabilidade::where('user_id', Auth::id())->latest()->paginate(5);
    return view('analises.index', compact('analises'));
}

    public function show($id)
    {
        $analise = AnaliseViabilidade::findOrFail($id);

        $sugestoes = json_decode($analise->sugestoes, true);

        return view('analises.show', compact('analise', 'sugestoes'));
    }

    public function edit($id)
    {
        $analise = AnaliseViabilidade::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('analises.edit', compact('analise'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_negocio' => 'required|string|max:255',
            'tipo_negocio' => 'required|string',
            'capital_inicial' => 'required|numeric',
            'provincia' => 'required|string',
            'localizacao' => 'required|string',
            'concorrencia' => 'required|string',
            'demanda_local' => 'required|string',
            'experiencia' => 'required|string',
            'fornecedores' => 'required|string',
            'apoio' => 'required|string',
            'retorno' => 'required|integer',
        ]);

        $analise = AnaliseViabilidade::findOrFail($id);

        // ✅ Só edita se for o dono (mesmo sendo super admin)
        if ($analise->user_id !== Auth::id()) {
            abort(403, 'Você só pode editar análises criadas por si.');
        }

        $dados = $request->only([
            'nome_negocio',
            'tipo_negocio',
            'capital_inicial',
            'provincia',
            'localizacao',
            'concorrencia',
            'demanda_local',
            'experiencia',
            'fornecedores',
            'apoio',
            'retorno'
        ]);

        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $response = $client->post(env('FLASK_API_URL') . '/prever', [
                'json' => $dados
            ]);

            $resultadoFlask = json_decode($response->getBody(), true);

            $analise->update(array_merge($dados, [
                'resultado' => $resultadoFlask['resultado'] ?? 'Desconhecido',
                'sugestoes' => isset($resultadoFlask['sugestoes']) ? json_encode($resultadoFlask['sugestoes']) : null
            ]));

            return redirect()->route('analises.show', $analise->id)
                ->with([
                    'resultado' => $resultadoFlask['resultado'] ?? 'Sem resultado',
                    'sugestoes' => $resultadoFlask['sugestoes'] ?? []
                ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar a análise: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $analise = AnaliseViabilidade::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $analise->delete();

        return redirect()->route('analises.index')->with('success', 'Análise excluída com sucesso.');
    }



    public function create()
    {
        return view('analises.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nome_negocio' => 'required|string',
            'tipo_negocio' => 'required|string',
            'capital_inicial' => 'required|numeric',
            'provincia' => 'required|string',
            'localizacao' => 'required|string',
            'concorrencia' => 'required|string',
            'demanda_local' => 'required|string',
            'experiencia' => 'required|string',
            'fornecedores' => 'required|string',
            'apoio' => 'required|string',
            'retorno' => 'required|numeric',
        ]);

        $dados = $request->only([
            'tipo_negocio',
            'capital_inicial',
            'provincia',
            'localizacao',
            'concorrencia',
            'demanda_local',
            'experiencia',
            'fornecedores',
            'apoio',
            'retorno'
        ]);

        try {
            $response = Http::timeout(10)->asJson()->post(env('FLASK_API_URL') . '/prever', $dados);


            if ($response->failed()) {
                return back()->withErrors('Erro ao conectar com o modelo de IA. Tente novamente mais tarde.');
            }

            $resultado = $response->json('resultado');
            $sugestoes = $response->json('sugestoes');

            $analise = new AnaliseViabilidade();
            $analise->user_id = Auth::id(); // Super admin também tem user_id
            $analise->nome_negocio = $request->nome_negocio;
            $analise->fill($dados);
            $analise->resultado = $resultado;
            $analise->sugestoes = !empty($sugestoes) ? json_encode($sugestoes) : null;
            $analise->save();

            return redirect()->route('analises.show', $analise->id)
                ->with('resultado', $resultado)
                ->with('sugestoes', $sugestoes);
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao processar a análise: ' . $e->getMessage());
        }
    }
}
