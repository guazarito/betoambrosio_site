<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    protected $fillable = [
        'id', 'capa', 'texto_parte1','texto_parte2'
    ];

}
