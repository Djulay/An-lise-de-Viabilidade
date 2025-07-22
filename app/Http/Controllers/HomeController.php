<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // <-- ISSO AQUI!!!
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $cursosDestaque = Curso::where('slug', 'destacar')->latest()->get();
        return view('welcome', compact('cursosDestaque'));
    }

    public function quemSomos()
    {
        return view('quem-somos');
    }

    public function mostrarFormulario()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'mensagem' => 'required|string',
        ]);

        Mail::send('email', $dados, function ($message) use ($dados) {
            $message->to('secretaria@ideiaviavel.co.ao')
                    ->subject('Nova mensagem de contacto de ' . $dados['nome']);
        });

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
    }


