<?php

namespace App\Http\Controllers;

use App\Color;


class admMudaCorController extends Controller
{
    private $mColor;

    public function __construct(Color $mColor)
    {
        $this->mColor = $mColor;
    }

    
    public function muda_cor($campo,$cor)
    
    {
    	
		$colors = $this->mColor->find(1);
		
		$colors->$campo = $cor;
		
		$colors->save();
		
		
    }

  
}

?>