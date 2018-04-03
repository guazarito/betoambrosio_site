<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	
	protected $fillable = [
        'id', 'menu', 'menu_hover','capa_parte1','capa_parte2'
    ];
	
}
