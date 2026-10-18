<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    protected $table = 'aluno';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'nome_responsavel',
        'rm',
        'turma',
        'numero_responsavel',
    ];

    protected $hidden = ['senha'];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'senha' => 'hashed',
        ];
    }
}
