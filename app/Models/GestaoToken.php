<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GestaoToken extends Model
{
    protected $table = 'gestao_token';

    protected $fillable = [
        'gestao_id',
        'token',
        'valido_ate',
    ];

    public function gestao()
    {
        return $this->belongsTo(Gestao::class, 'gestao_id');
    }
}

