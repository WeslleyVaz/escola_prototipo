<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $table = 'ocorrencias';

    protected $fillable = [
        'id_aluno',
        'turma_aluno',
        'rm_aluno',
        'inspetora_responsavel',
        "ocorrido",
        'procedimento_realizado',
    ];
}
