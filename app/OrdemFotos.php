<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemFotos extends Model
{
                protected $fillable = [
            		'id', 'album_id', 'ordem_fotos'
            ];
}
