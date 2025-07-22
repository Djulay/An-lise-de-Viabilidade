<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        // Guarda a URL de redirecionamento após registro, se existir
        if ($request->has('redirect_to')) {
            session(['redirect_to' => $request->query('redirect_to')]);
        }

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'telefone' => 'nullable|string|max:20',
            'provincia' => 'nullable|string|max:100',
            'termos' => ['accepted'], // <- essa linha garante que o usuário aceitou os termos
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'provincia' => $request->provincia,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redireciona para a URL salva na sessão (ou dashboard se não tiver)
        $redirectTo = session('redirect_to');
        session()->forget('redirect_to'); // Limpa a sessão após o uso
        return redirect()->to($redirectTo ?? route('dashboard'));
    }
}
