<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function listarInscricoes(Request $request)
    {
        $status = $request->query('status');

        $inscricoes = Inscricao::with(['user', 'curso'])
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->get();

        return view('admin.inscricoes', compact('inscricoes'));
    }

    public function aprovar($id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->status = 'aprovado';
        $inscricao->save();

        return redirect()->back()->with('success', 'Inscrição aprovada com sucesso!');
    }
}

