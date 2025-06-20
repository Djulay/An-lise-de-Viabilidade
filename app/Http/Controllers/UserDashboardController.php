<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function cursos()
    {
        $user = Auth::user();

        $inscricoesAprovadas = $user->inscricoes()
            ->with('curso')
            ->where('status', 'aprovado')
            ->get();

        return view('user.cursos', compact('inscricoesAprovadas'));
    }
}
