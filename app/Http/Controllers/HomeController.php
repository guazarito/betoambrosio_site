<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Cover;
use App\Color;

class HomeController extends Controller
{
	private $mCover;
    private $mColor;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Cover $mCover, Color $mColor)
    {	

		
        $this->middleware('auth');
		
		$this->mCover = $mCover;
        $this->mColor = $mColor;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capa_site_textos = $this->mCover->find(1); 
        
        $colors = $this->mColor->find(1);
        $capa_site[0]='null';
        $dir= 'layout/img/capa';
        $i=0;
        if (file_exists($dir)){
            $files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
           // usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
           shuffle($files);
            foreach($files as $file) {
                $capa_site[$i] = $file;
                $i++;
            }
        }

        return view('admHome', compact('capa_site','capa_site_textos', 'imagens', 'colors'));
    
    }
}
