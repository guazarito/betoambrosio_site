<?php

namespace App\Http\Controllers;
use App\Album;
use App\Category;
use App\Cover;
use App\Color;
use App\Talk;
use App\OrdemFotos;

use App\Http\Requests;

use App\Classes\upload_class;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use App\About;
use Image;



class admUploadController extends Controller
{
    private $mCategory;
    private $mAlbum;
    private $mCover;
    private $mAbout;
    private $mColor;
    private $mTalk;
	private $mOrdemfotos;

    public $destinationPath = 'albuns';

    public function __construct(Category $mCategory, Album $mAlbum, Cover $mCover, About $mAbout, Color $mColor, Talk $mTalk, Ordemfotos $mOrdemfotos)
    {
        $this->mCategory = $mCategory;
        $this->mAlbum = $mAlbum;
        $this->mCover = $mCover;
        $this->mAbout = $mAbout;
        $this->mColor = $mColor;
        $this->mTalk = $mTalk;
		$this->mOrdemfotos = $mOrdemfotos;
    }

    //pagina inicial da criacao do Album
    public function criar_album()
    {
        $categories = ['0'=> 'selecione'] + $this->mCategory->orderBy('titulo')->lists('titulo','id')->toArray();

        return view("admUploadIndex", compact('categories'));
    }
    
    
    //funcao que gera os thumbs das imgs..
    public function gerathumbs($album_id){
    	 
    	$dir = 'albuns/'.$album_id;
    	 
    	if (!file_exists($dir.'/thumbs')){
    		mkdir($dir.'/thumbs');
    		chmod($dir.'/thumbs',0777);
    	}
    
    	if (file_exists($dir)){
    		$files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    	}
    	 
    	ini_set('memory_limit', '1024M');
    	ini_set('max_execution_time', 600);
    	 
    	for($i=0;$i<sizeof($files);$i++){
    
    		$img[$i] = Image::make($files[$i]);
    
    		$img[$i]->resize(300, null, function ($constraint) {
    			$constraint->aspectRatio();
    		});
    
    			$img_nome= explode("/",$files[$i]);
    
    			$img[$i]->save('albuns/'.$album_id.'/thumbs/'.$img_nome[2]);
    
    
    
    			//echo $files[$i]."<br>";
    	}
    
    	//echo "1";
    	 
    }

	public function gerathumbs_palestras(){
    	 
    	$dir = 'imagens_palestras/';
    	 
    	if (!file_exists($dir.'/thumbs')){
    		mkdir($dir.'/thumbs');
    		chmod($dir.'/thumbs',0777);
    	}
    
    	if (file_exists($dir)){
    		$files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    	}
    	 
    	ini_set('memory_limit', '1024M');
    	ini_set('max_execution_time', 600);
    	 
    	for($i=0;$i<sizeof($files);$i++){
    
    		$img[$i] = Image::make($files[$i]);
    
    		$img[$i]->resize(300, null, function ($constraint) {
    			$constraint->aspectRatio();
    		});

    			$img_nome= explode("/",$files[$i]);
    
    			$img[$i]->save('imagens_palestras/thumbs/'.$img_nome[2]);
  
    			//echo $files[$i]."<br>";
    	}
    	//echo "1";
    }
	
    //criacao do album ->> upload das imagens e dados no BD................
    public function upload(Request $request)
    {
        $rules = array(
            'titulo' => 'required',
            'category_id' => 'required|not_in:0'
            );

        $validator = Validator::make(Input::all(), $rules);
        

        if ($validator->fails()) {

           // get the error messages from the validator
           // echo $validator->messages();
            Session::flash('error', '* Título e categoria são campos obrigatórios !');
            return Redirect::route('admCriarAlbum')->withInput();
        }
        else{


                if (!file_exists($this->destinationPath)) {
                    mkdir($this->destinationPath);
                    chmod($this->destinationPath,0777);
                }

                //grava os dados no BD:
                $data = $request->all();

                $id_album = $this->mAlbum->create($data)->id; //grava no BD

                if (!file_exists($this->destinationPath . "/" . $id_album)) {
                    mkdir($this->destinationPath . "/" . $id_album);
                    chmod($this->destinationPath . "/" . $id_album,0777);
                }

                //fim grava dados BD

                //inicio do upload das imagens------------------------------------
               
                /*$files = Input::file('images');
                $file_count = count($files);
                $uploadcount = 0;
                foreach ($files as $file) {
                    $rules2 = array('file' => 'required|max:9999999999|mimes:png,gif,jpeg,jpg,bmp'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                    $validator2 = Validator::make(array('file' => $file), $rules2);
                    if ($validator2->passes()) {
                        $filename = $file->getClientOriginalName();
                        //$filename = $uploadcount.".jpg";
                        $upload_success = $file->move($this->destinationPath . "/" . $id_album, $filename);
                        $uploadcount++;
                    }
                }
                
                $this->gerathumbs($id_album); */

               //fim upload imagens-----------------------------------------------

               return Redirect::to(asset('adm/album/' . $id_album)); //vai pra edicao do album
    }

   }

    //funcao que envia novas imagens para o album na sessao de edicao do album.....
    public function upload_editAlbum($id){
    	
    	    	
        if (file_exists($this->destinationPath."/".$id)) {

            //inicio do upload das imagens------------------------------------
            $files = Input::file('images');
            $file_count = count($files);
            $uploadcount = 0;
            foreach ($files as $file) {
                $rules = array('file' => 'required|max:9999999999|mimes:png,gif,jpeg,jpg,bmp'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file' => $file), $rules);
                if ($validator->passes()) {
                    $filename = $file->getClientOriginalName();
                    
					
                    $upload_success = $file->move($this->destinationPath . "/" . $id, $filename);
                    $uploadcount++;
                }
            }
			
            
            $this->gerathumbs($id);

            if ($uploadcount == $file_count) {
                return Redirect::to("adm/album/$id");

            } else {
                return Redirect::to("adm/album/$id")->withInput()->withErrors($validator);
            }
            
            
            //fim upload imagens-----------------------------------------------

        }else{
            return Redirect::to('adm/album/'.$id)->withInput()->withErrors("álbum inexistente");
        } 
    }


    //pagina de edicao do album...
    public function edita_album($id)
    {
        $infos_album = $this->mAlbum->find($id);
        //$categorias= $this->mCategory->orderBy('titulo')->lists('titulo','id');
        $categorias = $this->mCategory->orderBy('titulo')->get();

        $dir = $this->destinationPath."/".$id;
        $dir_thumbs = $this->destinationPath."/".$id."/thumbs";
		
		//verifica se ja existe registro na tabela OrdemFotos. Se existir, seleciona a ordem, se nao, apresenta na ordem da pasta.
		//=>
		if ($this->mOrdemfotos->where('album_id',$id)->count()==0) {
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
			$ordem_fotos = $this->mOrdemfotos->select('ordem_fotos')->where('album_id',$id)->first();
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
		        

       if(!empty($infos_album)) {
           return view("admEditAlbum", compact('infos_album', 'imagens', 'categorias'));
       }
       else{
              echo "página inexistente";
              error_log('página inexistente');
       }

    }

    //exclui as imagens selecionadas...
    public function exlui_img($pasta, $id_album, $nome_foto){
		
		if ($pasta=="imagens_palestras"){
			$url_foto = $pasta."/".$nome_foto;
			$url_thumb = $pasta."/thumbs/".$nome_foto;
			
			//echo $pasta."<br>".$id_album."<br>".$nome_foto;
			
		}else{
			$url_foto = $pasta."/".$id_album."/".$nome_foto;
			$url_thumb = $pasta."/".$id_album."/thumbs/".$nome_foto;
        }
		
	
        if(file_exists($url_foto)){
        //	chmod($url_foto,0777);
            if(unlink($url_foto)){
                echo "apagado";
            }else{
                echo "erro";
            }
        }
        
        if(file_exists($url_thumb)){
        //	chmod($url_thumb,0777);
        	if(unlink($url_thumb)){
        		echo "apagado";
        	}else{
        		echo "erro";
        	}
        }
    }
    
    
    public function exlui_imgs_capa($nome_foto){
    	
    	$pasta = 'layout/img/capa';
    	$url_foto = $pasta."/".$nome_foto;
    	
    
    	if(file_exists($url_foto)){
    		//chmod($url_foto,0777);
    		unlink($url_foto);
    	}
    
    
    }

    //salva no bd os campos editados no bootstrap editor inline
    public function edita_campos_inline(Request $request,$campo, $id){
        $serie = $this->mAlbum->find($id);
        $value = $request->get('value');
        $serie->$campo = $value;
        $serie->save();
    }

    //define a imagem de capa do album atraves do botao de radio...
    public function define_capa_album($pasta, $id_album, $nome_foto){
        $url_foto = $pasta."/".$id_album."/".$nome_foto;
        $url_thumb = $pasta."/".$id_album."/thumbs/".$nome_foto;
        
        if(file_exists($url_thumb)){
            return $this->mAlbum->where('id', $id_album)->update(['capa' => $url_thumb]);
        }elseif ((file_exists($url_foto))){
        	return $this->mAlbum->where('id', $id_album)->update(['capa' => $url_foto]);
        }
    }

    public function lista_albuns(){

        $albuns = $this->mAlbum->orderBy('category_id')->orderBy('id')->get();

        return view("admAlbuns", compact('albuns'));

        }

    public function exlui_album($id_album){
    	

		
   if (file_exists($this->destinationPath."/".$id_album."/thumbs")) {
			
    		try {
    			$files = glob($this->destinationPath."/".$id_album.'/thumbs/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    			foreach ($files as $file) {
    				chmod($file,0777);
    				unlink($file);
    			}
    			rmdir($this->destinationPath . "/" . $id_album."/thumbs");
    		}catch(Exception $e){
    			echo "<script>alert('erro: ' + $e)</script>";
    		}
    	}
    	
        if (file_exists($this->destinationPath."/".$id_album)) {
        	
            try {
                $files = glob($this->destinationPath."/".$id_album.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
                foreach ($files as $file) {
                	chmod($file,0777);
                    unlink($file);
                }
               // rmdir($this->destinationPath . "/" . $id_album);
                $this->mAlbum->where('id', $id_album)->delete();
                echo "1";
            }catch(Exception $e){
                echo "<script>alert('erro: ' + $e)</script>";
            }
        } 
		
		
    }

    public function adm_login(){
        return view('admLogin');
    }

    public function doLogin(Request $request){
        $userdata = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        );

		return redirect::to(route("adm_index"));
	

    /*    if (Auth::attempt($userdata)) {
			
			print_r($userdata);
			var_dump(Auth::attempt(['email' => 'admin', 'password' => 'admin']));
			if (Auth::attempt(['email' => 'admin', 'password' => 'admin'])) {
				echo "ú";
			}
			
	//		echo Auth::check();
      //      if(Auth::check()) {
        //        return redirect::to(route("adm_index"));
   //         }
  //      } else {
          //  Session::flash('error', 'Usuário e/ou senha incorreto(s), tente novamente !');
          //  return Redirect::route('adm_login')->withInput();
      } */
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to(route('adm_login')); // redirect the user to the login screen
    }

    public function lista_categorias(){
        $categorias= $this->mCategory->orderby('id')->get();
        return view('admCategorias', compact('categorias'));
    }

    public function criar_categoria(Request $request){
        $nova_categoria = $request->get('new_category');

        $this->mCategory->insert(['titulo'=>$nova_categoria]);
        return redirect::to(route('lista_categorias'));
    }

    //salva no bd as categorias editados no bootstrap editor inline
    public function edita_categoria_inline(Request $request, $id_categoria){
        $serie = $this->mCategory->find($id_categoria);
        $value = $request->get('value');
        $serie->titulo = $value;
        $serie->save();
    }

    public function criar_palestra(Request $request){
    	
    	
    	$palestra_local = $request->get('local_palestra');
    	$palestra_descricao = $request->get('descricao_palestra');
    	$palestra_data = $request->get('data_palestra');
    	
    	
    		$rules = array(
    				'local_palestra' => 'required',
    				'data_palestra' => 'required'
    		);
    		
    		$validator = Validator::make(Input::all(), $rules);
    		 
    		if ($validator->fails()) {
    			 
    			// get the error messages from the validator
    			//cho $validator->messages();
    			Session::flash('error', '* Local e data são campos obrigatórios !');
    			return Redirect::route('lista_palestras')->withInput();
    		}else{
    			 
    			$dia = explode("/",substr($palestra_data,0,10))[0];
    			$mes = explode("/",substr($palestra_data,0,10))[1];
    			$ano = explode("/",substr($palestra_data,0,10))[2];
    			 
    			$palestra_data = date('Y-m-d H:i', strtotime($mes."/".$dia."/".$ano.substr($palestra_data,10,strlen($palestra_data))));
    			 
    			$this->mTalk->local = $palestra_local;
    			$this->mTalk->descricao = $palestra_descricao;
    			$this->mTalk->data = $palestra_data;
    			$this->mTalk->save();
    			$id = $this->mTalk->id;
    			

    			$file = Input::file('image');
    			
    			$file_count = count($file);
    			
    			if (is_object($file)){
    			
	    			$img = Image::make($file);
	    			
	    			
	    			
	    			if (!file_exists('layout/img/palestras/'.$id)) {
	    				mkdir('layout/img/palestras/'.$id);
	    				chmod('layout/img/palestras/'.$id,0777);
	    			}
	    			
	    			$img_nome = $file->getClientOriginalName();
	    			
	    			$img->save('layout/img/palestras/'.$id.'/'.$img_nome);
	    			
    			}
    			return redirect::to(route('lista_palestras'));
    			 
    		}
    		
    		
    }
   

    //excluir categoria, apenas se nao estiver sendo usada..
    public function exlui_categoria($id_categoria){
       $data= $this->mAlbum->where('category_id',$id_categoria)->get();
        $categoria_titulo = $this->mCategory->find($id_categoria);

        if(sizeof($data)==0){
            //nao tem album associado -> pode deletar..
            $this->mCategory->find($id_categoria)->delete();
            return redirect::to(route('lista_categorias'));
        }else{
            //tem album associado -> nao pode deletar..
            foreach ($data as $album) {
                $albuns = $album->titulo.", ";
            }
            $validator= "Não é possível deletar a categoria <b><u>". $categoria_titulo->titulo.".</b></u><br>O(s) seguintes álbun(s) a estão utilizando: <b><u>".$albuns."</u></b>";
            return redirect::to(route('lista_categorias'))->withErrors($validator);
        }

    }
	
	public function capa_categoria($id_categoria){
      
        $categoria = $this->mCategory->find($id_categoria);		
		
		$dir= "capa_categorias/$id_categoria";
        $i=0;
        if (file_exists($dir)){
            $files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
            usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
            //shuffle($files);
			foreach($files as $file) {
                $capa_cat[$i] = $file;
                $i++;
            }
        }
		

         return view('admCapaCategorias', compact('categoria', 'capa_cat'));

    }
	
	
	public function upload_capa_categoria_nova_img($id_categoria){
    
	
    	if (!file_exists("capa_categorias/$id_categoria")) {
    		mkdir("capa_categorias/$id_categoria");
    		chmod("capa_categorias/$id_categoria",0777);
    	}
    
    	//inicio do upload das imagens------------------------------------
    	
    	$files = Input::file('image');
    	
    	$img = Image::make(Input::file('image'));
    	
    	$img->resize(400, null, function ($constraint) {
    		$constraint->aspectRatio();
    	});
    
    	$rules2 = array('files' => 'required|max:9999999999|mimes:png,gif,jpeg,jpg,bmp'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
    	$validator2 = Validator::make(array('files' => $files), $rules2);
    	if ($validator2->passes()) {
    		$filename = $files->getClientOriginalName();
    
    		//$upload_success = $files->move("layout/img/about/",$filename);
    		
    		$upload_success = $img->save("capa_categorias/$id_categoria/".$filename);
    		
    		$this->mCategory->where('id',$id_categoria)->update(['capa' => $filename]);
			
			//echo "foi";
    		return Redirect::to(route('admCapaCategoria',$id_categoria)); //volta pra pagina edita sobre
    	}else{
    		return redirect::to(route('admCapaCategoria',$id_categoria))->withErrors($validator2);
			//echo "nao foi".$validator2;
    	}
    
    	//fim upload imagens-----------------------------------------------
    
    }
    
    public function exlui_palestra($id_palestra){
    	$validator="Palestra excluída!";
    	try{
    		$this->mTalk->find($id_palestra)->delete();
    		if (file_exists("imagens_palestras/$id_palestra/")){
    			$files = glob("imagens_palestras/$id_palestra".'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    			foreach($files as $file) {
    				chmod($file,0777);
    				unlink($file);
    			}
				$files = glob("imagens_palestras/$id_palestra".'/thumbs/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    			foreach($files as $file) {
    				chmod($file,0777);
    				unlink($file);
    			}
				
				rmdir("imagens_palestras/$id_palestra"."/thumbs/");
				rmdir("imagens_palestras/$id_palestra/");
				
    		}
    	}catch (Exception $e){
    		$validator= "Não é possível deletar a palestra: ".$e;
    	}
    return redirect::to(route('lista_palestras'))->withErrors($validator);
    }

    public function adm_index(){
       //ATENCAO: a funcao que controla o index do adm esta em HomeController.php
    	$capa_site_textos = $this->mCover->find(1); 
        
        $colors = $this->mColor->find(1);
        $capa_site[0]='null';
        $dir= 'layout/img/capa';
        $i=0;
        if (file_exists($dir)){
            $files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
            usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
            //shuffle($files);
			foreach($files as $file) {
                $capa_site[$i] = $file;
                $i++;
            }
        }

        return view('admHome', compact('capa_site','capa_site_textos', 'imagens', 'colors'));
    }



    public function upload_capa_nova(){

        if (!file_exists('layout/img/capa')) {
            mkdir('layout/img/capa');
            chmod('layout/img/capa',0777);
        }

        //inicio do upload das imagens------------------------------------
        //$files = Input::file('image');
        
        
        $files = Input::file('images');
    
       
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 600);
        
        for($i=0;$i<sizeof($files);$i++){
        
        	$img[$i] = Image::make($files[$i]);
        
        	$img[$i]->resize(1200, null, function ($constraint) {
        		$constraint->aspectRatio();
        	});
        
        		
        		$img_nome= $files[$i]->getClientOriginalName();
        
        		$img[$i]->save('layout/img/capa/'.$img_nome);
        
        }
        
    
                return Redirect::to(asset(route('adm_index'))); //vai pra home
             

        //fim upload imagens-----------------------------------------------

    }

    //salva no bd os textos da capa do site
    public function edita_textos_capa_inline(Request $request, $campo){
        $serie = $this->mCover->find(1);
        $value = $request->get('value');
        $serie->$campo = $value;

        $serie->save();
    }


    public function recolocar_capa_usada($url){

        $url = str_replace("*","/",$url);

        $this->mCover->where('id',1)->update(['capa' => $url]);
        return Redirect::to(asset(route('adm_index'))); //vai pra home
    }
    
    public function edita_sobre(){
    	
    	$sobre = $this->mAbout->find(1);
    	
    	
    	$dir= 'layout/img/about';
    	$i=0;
    	if (file_exists($dir)){
    		$files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    		usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
    		foreach($files as $file) {
    			$imagens[$i] = $file;
    			$i++;
    		}
    	}
    	
    	
    	return view("admEditSobre", compact('sobre', 'imagens'));
    	 
    }
    
    
    //salva no bd os campos editados no bootstrap editor inline
    public function edita_about_inline(Request $request,$campo, $id){
    	
    	$serie = $this->mAbout->find(1);
    	$value = $request->get('value');
    	$serie->$campo = $value;
    	$serie->save(); 
    }
    
    
    public function edita_palestra_inline(Request $request,$campo, $id){
		$serie = $this->mTalk->find($id);
    	$value = $request->get('value');
		
		$order   = array("\r\n", "\n", "\r");
		$replace = '<br />';
		$newstr = str_replace($order, $replace, $value);

		$value = $newstr;
		
		$serie->$campo = $value;
		$serie->save();
		
		//return view('testEdit',compact('value'));
    }
    
    
    
    public function upload_about_nova_img(){
    
    	if (!file_exists('layout/img/about')) {
    		mkdir('layout/img/about');
    		chmod('layout/img/about',0777);
    	}
    
    	//inicio do upload das imagens------------------------------------
    	
    	$files = Input::file('image');
    	
    	$img = Image::make(Input::file('image'));
    	
    	$img->resize(800, null, function ($constraint) {
    		$constraint->aspectRatio();
    	});
    
    	$rules2 = array('files' => 'required|max:9999999999|mimes:png,gif,jpeg,jpg,bmp'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
    	$validator2 = Validator::make(array('files' => $files), $rules2);
    	if ($validator2->passes()) {
    		$filename = $files->getClientOriginalName();
    
    		//$upload_success = $files->move("layout/img/about/",$filename);
    		
    		$upload_success = $img->save("layout/img/about/".$filename);
    		
    		$this->mAbout->where('id',1)->update(['sobre' => "layout/img/about" . "/" .$filename]);
    		return Redirect::to(asset(route('adm.edita_about'))); //volta pra pagina edita sobre
    	}else{
    		return redirect::to(route('adm.edita_about'))->withErrors($validator2);
    	}
    
    	//fim upload imagens-----------------------------------------------
    
    }
    
    public function altera_img_palestra($id_palestra){
    	
    	//echo $id_palestra;
    	
    	
    
    	if (file_exists("layout/img/palestras/$id_palestra")) {
    		$files = glob("layout/img/palestras/$id_palestra".'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
    		foreach ($files as $file) {
    			chmod($file,0777);
    			unlink($file);
    		}
    	}else{
    		mkdir("layout/img/palestras/$id_palestra");
    		chmod("layout/img/palestras/$id_palestra",0777);
    	}
    
    	//inicio do upload das imagens------------------------------------
    	 
    	$files = Input::file('image');
    	 
    	$img = Image::make(Input::file('image'));
    	 
    	//$img->resize(800, null, function ($constraint) {
    	//	$constraint->aspectRatio();
    	//});
    
    		$rules2 = array('files' => 'required|max:9999999999|mimes:png,gif,jpeg,jpg,bmp'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
    		$validator2 = Validator::make(array('files' => $files), $rules2);
    		if ($validator2->passes()) {
    			$filename = $files->getClientOriginalName();
    
    			//$upload_success = $files->move("layout/img/about/",$filename);
    
    			$upload_success = $img->save("layout/img/palestras/$id_palestra/".$filename);
    
    			
    			return Redirect::to(asset(route('lista_palestras'))); //volta pra pagina edita sobre
    		}else{
    			return redirect::to(route('lista_palestras'))->withErrors($validator2);
    		}
    
    		//fim upload imagens-----------------------------------------------

    }
    
    
    public function recolocar_sobre_img_usada($url){
    
    	$url = str_replace("*","/",$url);
    
    	$this->mCategory->where('id',1)->update(['sobre' => $url]);
    	return Redirect::to(asset(route('adm.edita_about'))); 
    	
    }
    
	public function recolocar_capa_categoria_img_usada($url){
    
    	$url_vetor = explode("*",$url);
		
		$id_categoria = $url_vetor[0];
		$img = $url_vetor[1];
    
    	$this->mCategory->where('id',$id_categoria)->update(['capa' => $img]);
    	return Redirect::to(route('admCapaCategoria', $id_categoria)); 
    	
    }
	
    
    public function adm_lista_palestras(){
    
    	$palestra = $this->mTalk->find(1);
    	
		$dir= "imagens_palestras/thumbs";
        $i=0;
        if (file_exists($dir)){
            $imagens = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
            usort($imagens, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
        }

		
		
    	return view('admPalestras', compact('palestra', 'imagens'));
    }
	
	
	
	  public function envia_fotos_palestras($id_palestra){  	 
    	return view('SiteUploadFotos_palestras', compact('id_palestra'));
    }
    
	
	//TODO!!!!!!!!!!
    public function envia_fotos_upload_palestras(){
    	

    	$upload = new upload_class;
    	
		
    	$upload->upload_dir = "imagens_palestras/";
    	
    	
    	$upload->extensions = array('.png', '.jpg', '.bmp', '.gif', '.JPG', '.jpeg', '.PNG', '.BMP','.GIF'); // specify the allowed extensions here
    	$upload->rename_file = true;
    	
		if (!file_exists($upload->upload_dir)) {
    		mkdir($upload->upload_dir);
    //		chmod($upload->upload_dir,0777);
    	}
    	
    	$status = "";
    	
    	if(!empty($_FILES)) {
    		$upload->the_temp_file = $_FILES['userfile']['tmp_name'];
    		$upload->the_file = $_FILES['userfile']['name'];
    		$upload->http_error = $_FILES['userfile']['error'];
    		$upload->do_filename_check = 'y'; // use this boolean to check for a valid filename
    		if ($upload->upload()){
    			$this->gerathumbs_palestras();
    			echo '<div id="status">success</div>';
    			echo '<div id="message"> Enviado com Suceso!</div>';
    			//return the upload file
    			echo '<div id="uploadedfile">'. $upload->upload_dir." ".$upload->file_copy .'</div>';
    			} else {
    			
    				echo '<div id="status">failed</div>';
    				echo '<div id="message">'. $upload->show_error_string() .'</div>';
    	
    		}
    	}
    	
   // 	return view('SiteUploadFotos', compact('status')); 
    }
    
    public function envia_fotos($id_album){  	 
    	return view('SiteUploadFotos', compact('id_album'));
    }
    
    public function envia_fotos_upload($id_album){
    	
    	$upload = new upload_class;
    	
    	$upload->upload_dir = $this->destinationPath . "/" . $id_album. "/";
    	
    	
    	$upload->extensions = array('.png', '.jpg', '.bmp', '.gif', '.JPG', '.jpeg', '.PNG', '.BMP','.GIF'); // specify the allowed extensions here
    	$upload->rename_file = true;
    	
    	
    	$status = "";
    	
    	if(!empty($_FILES)) {
    		$upload->the_temp_file = $_FILES['userfile']['tmp_name'];
    		$upload->the_file = $_FILES['userfile']['name'];
    		$upload->http_error = $_FILES['userfile']['error'];
    		$upload->do_filename_check = 'y'; // use this boolean to check for a valid filename
    		if ($upload->upload()){
    			$this->gerathumbs($id_album);
				
				//=>
				//inserir as fotos novas no inicio da string que controla a ordem das fotos (tabela ordem_fotos)
				if ($this->mOrdemfotos->where('album_id',$id_album)->count()!=0) {
					$ordem_fotos = $this->mOrdemfotos->select('ordem_fotos')->where('album_id',$id_album)->first();
					$ordem_fotos = str_replace("{\"ordem_fotos\":\"","",$ordem_fotos);
					$ordem_fotos = str_replace("\"}","",$ordem_fotos);
					$this->mOrdemfotos->where('album_id',$id_album)->update(['ordem_fotos' => $upload->file_copy.";".$ordem_fotos]);
				}
				//<=
				
    			echo '<div id="status">success</div>';
    			echo '<div id="message"> Enviado com Suceso!</div>';
    			//return the upload file
    			echo '<div id="uploadedfile">'. $upload->file_copy .'</div>';
    			} else {
    			
    				echo '<div id="status">failed</div>';
    				echo '<div id="message">'. $upload->show_error_string() .'</div>';
    	
    		}
    	}
    	
   // 	return view('SiteUploadFotos', compact('status'));
    }
	
	public function edita_fotos_palestras($id_palestra){
       

        $dir= "imagens_palestras/$id_palestra";
        $i=0;
        if (file_exists($dir)){
            $imagens = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
            usort($imagens, create_function('$a,$b', 'return filemtime($b) - filemtime($a);')); //ordena o vetor por ordem de data !
        }

        return view('admEditImagensPalestras', compact('imagens', 'id_palestra'));
    }
	
	//	Route::get('editafotos_palestras/{id_palestra}', ['uses'=> 'admUploadController@edita_fotos_palestras' ]);
	
	public function sort_fotos($id, Request $request){

		$this->mOrdemfotos->album_id = $id;
		$vetor_url_fotos=($request->get('nomes_fotos'));
		
		$url_fotos_separados = explode(";",$vetor_url_fotos[0]);
		
		//print_r($url_fotos_separados);
		
		$aux = "";
		
		foreach ($url_fotos_separados as $k => $val){
			$aux = $aux.substr($val,strpos($val,"thumbs")+7,strlen($val)).";";
		}
		
		$str_ordem = substr($aux,0,strlen($aux)-2);
		
		$this->mOrdemfotos->ordem_fotos =  $str_ordem;
		
		if ($this->mOrdemfotos->where('album_id',$id)->count()==0) {
			//insere
			$this->mOrdemfotos->save();
			//echo "insere";
		}else{
			//atualiza
			$this->mOrdemfotos->where('album_id', $id)->update(['ordem_fotos' => $str_ordem]);
			//echo "atualiza";
			
		}
		
		echo "ok";
		
				
	}
}

?>