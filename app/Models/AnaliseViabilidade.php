<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnaliseViabilidade extends Model
{
    use HasFactory;

     protected $table = 'analises_viabilidade';

    protected $fillable = [
        'user_id',
        'nome_negocio',
        'tipo_negocio',
        'capital_inicial',
        'provincia',
        'localizacao',
        'concorrencia',
        'demanda_local',
        'experiencia',
        'fornecedores',
        'apoio',
        'retorno',
        'resultado',
    ];

    // Relacionamento: uma análise pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
