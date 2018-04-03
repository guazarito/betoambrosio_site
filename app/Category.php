<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'titulo', 'capa'
    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}


