<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Auth;

class CursoInscricaoController extends Controller
{
    // Mostra o formulário de inscrição do curso
    public function mostrarFormulario($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.inscricao', compact('curso'));
    }

    public function inscrever(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $usuario = Auth::user();

        // Verifica se o usuário já está inscrito
        $jaInscrito = Inscricao::where('user_id', $usuario->id)
            ->where('curso_id', $curso->id)
            ->exists();

        if ($jaInscrito) {
            // Retorna com mensagem de que já está inscrito
            return redirect()
                ->route('cursos.show', ['id' => $curso->id])
                ->with('warning', 'Você já está inscrito neste curso.');
        }

        // Caso não esteja inscrito, faz a inscrição
        Inscricao::create([
            'user_id' => $usuario->id,
            'curso_id' => $curso->id,
            'status' => 'aguardando',
        ]);

        $curso->increment('inscritos'); // Atualiza contagem no curso

        return redirect()
            ->route('cursos.show', ['id' => $curso->id])
            ->with('success', 'Inscrição feita com sucesso! Envie o comprovativo do pagamento pelo WhatsApp para que sua inscrição seja ativada.');
    }
}
