<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    public $timestamps = false;

    protected $fillable = [
        'cpf',
        'senha',
        'tipo',
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