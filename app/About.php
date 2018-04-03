<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'id', 'sobre', 'texto_parte1','texto_parte2','texto_parte3'
    ];

}
