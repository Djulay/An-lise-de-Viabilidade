<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }

        $usuarios = User::paginate(10); // Paginação de 10 usuários por página

        return view('admin.usuarios.index', compact('usuarios'));
    }


    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telefone' => 'nullable|string|max:20',
            'provincia' => 'nullable|string|max:100',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|in:user,super-admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'provincia' => $request->provincia,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function show(User $usuario)
    {
        return view('admin.usuarios.Show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        return view('admin.usuarios.edit', compact('usuario'));
    }


    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }

        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
            'telefone' => 'nullable|string|max:20',
            'provincia' => 'nullable|string|max:100',
            'role' => 'required|in:user,super-admin',
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'provincia' => $request->provincia,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $usuario->password,
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')
            ->with('success', 'Usuário apagado com sucesso.');
    }
}
