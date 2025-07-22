<?php

namespace App\Http\Controllers;

use App\Models\AnaliseViabilidade;
use App\Models\Curso;
use App\Models\Inscricao;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
       return view('admin.dashboard', [
        'usuariosCount' => User::count(),
        'cursosCount' => Curso::count(),
        'analisesCount' => AnaliseViabilidade::count(),
        'inscricoesCount' => Inscricao::count(),

        // Gráficos
        'userCount' => User::where('role', 'user')->count(),
        'adminCount' => User::where('role', 'super-admin')->count(),
        'viavelCount' => AnaliseViabilidade::where('resultado', 'Viável')->count(),
        'naoViavelCount' => AnaliseViabilidade::where('resultado', 'Não Viável')->count(),
    ]);
    }
}
