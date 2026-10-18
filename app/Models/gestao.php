<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gestao extends Model
{
    protected $table = 'gestao';

    public $timestamps = false;

    protected $fillable = [
        'cpf',
        'senha',
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
