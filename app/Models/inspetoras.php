<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inspetoras extends Model
{
    protected $table = 'inspetoras';

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