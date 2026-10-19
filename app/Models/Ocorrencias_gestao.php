<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocorrencias_gestao extends Model
{
    protected $table = "ocorrencias_gestao";

    protected $fillable = [
        'id_aluno',
        'turma_aluno',
        'rm_aluno',
        'inspetora_responsavel',
        'ocorrido',
        'procedimento_realizado',
    ];
}
