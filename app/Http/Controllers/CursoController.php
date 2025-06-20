<?php

namespace App\Http\Controllers;

use App\Models\Curso; // Importar o Model Curso
use Illuminate\Http\Request;

class CursoController extends Controller
{




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Armazena um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'duracao' => 'nullable|string|max:255',
        'custo' => 'nullable|numeric',
        'requisito' => 'nullable|string|max:255',
        'modalidade' => 'required|in:Presencial,Hibrida',
        'local' => 'nullable|string|max:255',
        'ofertas' => 'nullable|string|max:255',
        'descricao' => 'nullable|string',
       'slug' => 'required|string', 
        'imagem' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('imagem')) {
        $path = $request->file('imagem')->store('cursos', 'public');
        $validated['imagem'] = $path;
    }

    $validated['destaque'] = $request->boolean('destaque');

    $validated['inscritos'] = 0;

    Curso::create($validated);

    return redirect()->route('admin.cursos.index')->with('success', 'Curso cadastrado com sucesso!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $curso = Curso::findOrFail($id);

    $data = $request->validate([
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'nome' => 'required|string',
        'duracao' => 'nullable|string',
        'custo' => 'nullable|numeric',
        'requisito' => 'nullable|string',
        'modalidade' => 'required|in:Presencial,Hibrida',
        'local' => 'nullable|string',
        'ofertas' => 'nullable|string',
        'descricao' => 'nullable|string',
        'slug' => 'required|string', 
    ]);

    if ($request->hasFile('imagem')) {
        $path = $request->file('imagem')->store('cursos', 'public');
        $data['imagem'] = $path;
    }

    $validated['destaque'] = $request->boolean('destaque');

    $curso->update($data);

    return redirect()->route('admin.cursos.index')->with('success', 'Curso atualizado com sucesso!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);

        if ($curso->imagem) {
            // \Storag::disk('public')->delete($curso->imagem);
        }

        $curso->delete();

        return redirect()->route('admin.cursos.index')->with('success', 'Curso excluído com sucesso!');
    }
}
