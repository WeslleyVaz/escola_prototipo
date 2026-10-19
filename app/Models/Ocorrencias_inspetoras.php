<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocorrencias_inspetoras extends Model
{
    protected $table = 'ocorrencias_inspetoras';

    protected $fillable = [
        'id_aluno',
        'turma_aluno',
        'rm_aluno',
        'inspetora_responsavel',
        'ocorrido',
        'procedimento_realizado',
    ];
}
