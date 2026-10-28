<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspetorasToken extends Model
{
    protected $table = 'inspetoras_token';

    protected $fillable = [
        'inspetoras_id',
        'token',
        'valido_ate',
    ];

    public function inspetora()
    {
        return $this->belongsTo(Inspetoras::class, 'inspetoras_id');
    }
}
