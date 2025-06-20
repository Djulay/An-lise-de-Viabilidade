<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  // App\Models\Curso.php
protected $fillable = [
    'nome',
    'duracao',
    'custo',
    'requisito',
    'modalidade',
    'local',
    'ofertas',
    'descricao',
    'slug' , 
    'imagem',
    'inscritos',
];

public function usuarios()
{
    return $this->belongsToMany(User::class);
}



}
