<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'category_id','titulo', 'descricao', 'capa'
    ];

    public function category(){
      return  $this->belongsTo(Category::class);
    }
}
