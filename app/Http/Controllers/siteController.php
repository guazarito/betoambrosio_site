<?php

namespace App\Http\Controllers;


use App\Cover;
use App\Category;
use App\Album;
use App\About;
use App\Color;
use App\Talk;
use App\OrdemFotos;



class siteController extends Controller
{
    private $mCover;
    private $mCategory;
    private $mAlbum;
    private $mAbout;
    private $mColor;
    private $mTalk;
	private $mOrdemfotos;

    public function __construct(Cover $mCover, Category $mCategory, Album $mAlbum, About $mAbout, Color $mColor, Talk $mTalk, Ordemfotos $mOrdemfotos)
    {
        $this->mCover = $mCover;
        $this->mCategory = $mCategory;
        $this->mAlbum = $mAlbum;
        $this->mAbout = $mAbout;
        $this->mColor = $mColor;
        $this->mTalk = $mTalk;
		$this->mOrdemfotos = $mOrdemfotos;
    }

    public function index(){

        $capa_texto_site = $this->mCover->find(1); 
    	$i=0;
    	$dir_capas = 'layout/img/capa';
    	
    	if(file_exists($dir_capas)){
    		$files = glob($dir_capas.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    		//usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
			shuffle($files); //random!
    		foreach($files as $file) {
    			$capa_site[$i] = $file;
    			$i++;
    		}
    	}
    	
    	$categorias = $this->mCategory->all();
		$sobre = $this->mAbout->find(1);
		$colors = $this->mColor->find(1);
		$palestras = $this->mTalk->all();

        foreach ($categorias as $categoria) {
			
			if ($categoria->capa != ""){
				$capa_albuns_random[$categoria->id] = "capa_categorias/$categoria->id/$categoria->capa";
			}else{
				$capa_albuns_random[$categoria->id] = $capa_albuns_random[$categoria->id]=$this->mAlbum->where('category_id',$categoria->id)->where('capa','<>','')->orderbyraw("rand()")->take(1)->value('capa');
			}
		}

		$dir= 'imagens_palestras';
		$dir_thumbs = 'imagens_palestras/thumbs';
		
    	$palestra = $this->mTalk->find(1);
    	
        $i=0;
        if (file_exists($dir_thumbs)){
        	$files = glob($dir_thumbs.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
        	usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
        	foreach($files as $file) {
        		$imagens_palestra[$i] = $file;
        		$i++;
        	}
        }elseif (file_exists($dir)){
            $files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
            usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
            foreach($files as $file) {
                $imagens_palestra[$i] = $file;
                $i++;
            }
        }
		
        //print_r($capa_site);
		//print_r($capa_albuns_random);
        return view('SiteIndex', compact('capa_site','capa_texto_site', 'categorias', 'capa_albuns_random', 'sobre', 'colors', 'imagens_palestra', 'palestra'));
    }

    public function lista_albuns($categoria_id){

        $categoria = $this->mCategory->find($categoria_id);
        $albuns = $this->mAlbum->where('category_id', $categoria_id)->get();


        if(!empty($categoria)) {
            return view('SiteAlbunsPorCategoria', compact('categoria','albuns'));
        }
        else{
            echo "Categoria inexistente";
        }
    }

    public function lista_fotos_albuns($categoria_id, $album_id){
    
    
 

	
    
        $categoria = $this->mCategory->find($categoria_id);
        $album = $this->mAlbum->find($album_id);
        $albuns = $this->mAlbum->where('category_id', $categoria_id)->get();

        $dir= 'albuns/'.$album->id;
        $dir_thumbs = 'albuns/'.$album->id.'/thumbs';

		//verifica se ja existe registro na tabela OrdemFotos. Se existir, seleciona a ordem, se nao, apresenta na ordem da pasta.
		//=>
		if ($this->mOrdemfotos->where('album_id',$album_id)->count()==0) {
			//nao existe registro na ordem_fotos
			$i=0;
			if (file_exists($dir_thumbs)){
				$files = glob($dir_thumbs.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
				usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
				foreach($files as $file) {
					$imagens[$i] = $file;
					$i++;
				}
			}elseif(file_exists($dir)){
				$files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
				usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
				foreach($files as $file) {
					$imagens[$i] = $file;
					$i++;
				}        	
			}			
		}else{
			//existe registro ordem_fotos
			$ordem_fotos = $this->mOrdemfotos->select('ordem_fotos')->where('album_id',$album_id)->first();
			$ordem_fotos = str_replace("{\"ordem_fotos\":\"","",$ordem_fotos);
			$ordem_fotos = str_replace("\"}","",$ordem_fotos);
			$ordem_fotos = explode(";",$ordem_fotos);
			$i=0;
			if (file_exists($dir_thumbs)){
				foreach($ordem_fotos as $foto){
					if (file_exists($dir_thumbs."/".$foto)){
						$imagens[$i] = $dir_thumbs."/".$foto;
						$i++;
					}
				}
			}elseif(file_exists($dir)){
				foreach($ordem_fotos as $foto){
					if (file_exists($dir."/".$foto)){
						$imagens[$i] = $dir."/".$foto;
						$i++;
					}
				}
			}
		}
		//<=

	
        return view('SiteFotosPorAlbunsPorCategoria',compact('categoria','album','imagens', 'albuns'));
    }
    
    public function palestras_info($palestra_id){
    	
		$dir= 'imagens_palestras/'.$palestra_id;
        $dir_thumbs = 'imagens_palestras/'.$palestra_id.'/thumbs';
		
    	$palestra = $this->mTalk->find($palestra_id);
    	
        $i=0;
        if (file_exists($dir_thumbs)){
        	$files = glob($dir_thumbs.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
        	usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
        	foreach($files as $file) {
        		$imagens[$i] = $file;
        		$i++;
        	}
        }elseif (file_exists($dir)){
            $files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
            usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
            foreach($files as $file) {
                $imagens[$i] = $file;
                $i++;
            }
        }
    	
    	//print_r($img_palestra);
    	
    	return view('SitePalestrasInfo',compact('palestra', 'imagens'));
    	 
    }


}

