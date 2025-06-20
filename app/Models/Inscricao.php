<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Inscricao.php
class Inscricao extends Model
{
    protected $table = 'inscricoes'; // <- Corrige o nome da tabela

    protected $fillable = [
        'user_id',
        'curso_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }


    public function listarInscricoes()
{
    $inscricoes = Inscricao::with(['user', 'curso'])
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin.inscricoes', compact('inscricoes'));
}
}