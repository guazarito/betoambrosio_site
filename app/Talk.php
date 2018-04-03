<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{

            protected $fillable = [
            		'id', 'descricao', 'local','data'
            ];
            
            
}
