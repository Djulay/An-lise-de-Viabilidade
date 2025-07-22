<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnaliseViabilidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AnaliseAdminController extends Controller
{
    // Listar todas as análises, mas só permitir edição das criadas pelo Super Admin
    public function index()
    {
        $analises = AnaliseViabilidade::with('user')->latest()->get();
        return view('admin.analises.index', compact('analises'));
    }

    

    // Formulário de criação
    public function create()
    {
        return view('admin.analises.create');
    }

    // Armazenar nova análise
    public function store(Request $request)
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
                return back()->withErrors('Erro ao conectar com o modelo de IA.');
            }

            $resultado = $response->json('resultado');
            $sugestoes = $response->json('sugestoes');

            $analise = new AnaliseViabilidade();
            $analise->user_id = Auth::id();
            $analise->nome_negocio = $request->nome_negocio;
            $analise->fill($dados);
            $analise->resultado = $resultado;
            $analise->sugestoes = !empty($sugestoes) ? json_encode($sugestoes) : null;
            $analise->save();

            return redirect()->route('admin.analises.show', $analise->id)
                ->with('resultado', $resultado)
                ->with('sugestoes', $sugestoes);
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao processar a análise: ' . $e->getMessage());
        }
    }


    // Exibir uma análise
    public function show($id)
    {
        $analise = AnaliseViabilidade::with('user')->findOrFail($id);
        $sugestoes = $analise->sugestoes ? json_decode($analise->sugestoes, true) : [];

        return view('admin.analises.show', compact('analise', 'sugestoes'));
    }

    // Editar apenas se for do super admin
    public function edit($id)
    {
        $analise = AnaliseViabilidade::findOrFail($id);

        if ($analise->user_id !== Auth::id()) {
            abort(403, 'Você só pode editar análises criadas por você.');
        }

        $sugestoes = $analise->sugestoes ? json_decode($analise->sugestoes, true) : [];

        return view('admin.analises.edit', compact('analise', 'sugestoes'));
    }


    // Atualizar análise
    public function update(Request $request, $id)
    {
        $analise = AnaliseViabilidade::findOrFail($id);

        if ($analise->user_id !== Auth::id()) {
            abort(403, 'Acesso negado.');
        }

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
            $response = Http::timeout(10)->asJson()->post(env('FLASK_API_URL') . '/prever', $dados);

            if ($response->failed()) {
                return back()->withErrors('Erro ao conectar com o modelo de IA.');
            }

            $resultado = $response->json('resultado') ?? 'Sem resultado';
            $sugestoes = $response->json('sugestoes') ?? [];

            $analise->update([
                ...$dados,
                'resultado' => $resultado,
                'sugestoes' => !empty($sugestoes) ? json_encode($sugestoes) : null
            ]);

            // 🔥 Redireciona sem passar sugestões via session
            return redirect()->route('admin.analises.show', $analise->id);
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao atualizar a análise: ' . $e->getMessage());
        }
    }



    // Apagar qualquer análise
    public function destroy($id)
    {
        $analise = AnaliseViabilidade::findOrFail($id);
        $analise->delete();

        return redirect()->route('admin.analises.index')->with('success', 'Análise excluída com sucesso.');
    }
}
