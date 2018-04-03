<html>
	
	    <script src="{!! asset('layout/js/jquery.js') !!}"></script>

    <link href="{!! asset('layout/css/jqueryLoader.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/js/jqueryLoader.js') !!}"></script>

    <script src="{!! asset('layout/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
    <script src="{!! asset('layout/fancyBox/source/jquery.fancybox.js?v=2.1.5') !!}"></script>
    <link href="{!! asset('layout/fancyBox/source/jquery.fancybox.css?v=2.1.5') !!}" rel="stylesheet">
	
	<script src="{!! asset('layout/js/ownjs.js') !!}"></script>
	
     <!-- Bootstrap Core CSS -->
    <link href="{!! asset('layout/css/bootstrap.css') !!}" rel="stylesheet">

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('layout/js/bootstrap.js') !!}"></script>
	<link href="{!! asset('layout/css/owncss.css') !!}" rel="stylesheet">
 
	
 
	<style>
	*{
		padding:0;
		margin:0;
		font-family: tahoma;
	}
	
	body{
		background-color: #c0c0c0;
	}
	
		.capa-container {
			border: 2px dashed #000;
			padding-bottom: 15px;
			margin-top:4px;
		}
		
	.glyphicon{
		font-size:20px;
	}
	
	.img_capa_cat, .img_capa_cat_v{
		width: 100%;
	}
	</style>

	<div class="container">
	<h1>{{$categoria->titulo}}</h1>

        <div class="row">

			<div class="col-lg-6 capa-container">       
        		   	  <h3>Capa:</h3>
        		   	  <?php 
        		   	  $classe_imagem = "img_capa_cat";
        		   	  if ($categoria->capa!= "" && file_exists ('capa_categorias/'.$categoria->id."/".$categoria->capa)){
	        		   	  list($width, $height) = getimagesize('capa_categorias/'.$categoria->id."/".$categoria->capa);
	        		   	  
	        		   	  $classe_imagem = "img_capa_cat";
	        		   	  
	        		   	  if($width < $height){
	        		   	  	$classe_imagem = "img_capa_cat_v";
	        		   	  }
        		   	  }
        		   	  ?>
        	
					<span class="file-wrapper" style="position: absolute;">
						<form method="POST" action="{{route('altera_img_capa_categoria', $categoria->id)}}" accept-charset="UTF-8" role="form" id="Frm_altera_capa_categoria" enctype="multipart/form-data">
						<input id="btn_altera_capa_categoria" name="image" type="file">
								<span class="lapis_edit_" id="lapis_edit1">
									<button type="button" class="btn btn-default" >
									Trocar foto 
										<span class="glyphicon glyphicon-pencil"></span>
									</button>	
								</span>
						</form>
					</span>

		           @if( is_object($categoria) && file_exists('capa_categorias/'.$categoria->id."/".$categoria->capa) && $categoria->capa!= "" ) 
        			  <img src="{{'/capa_categorias/'.$categoria->id."/".$categoria->capa}}" class="{{$classe_imagem}}">        
        		   @else
        		    <img src="/layout/img/no-image.jpg" class="{{$classe_imagem}}"> 
        		   @endif
			</div>
		</div>
	
	</div>
	
	<br><br>


	    <div class="container-fluid">
	    	<div id="capas_usadas">
		        <h4 class="text-muted">Imagens já utilizadas:</h4>
		        <br>
		        <div class="row" style="margin:auto;">
		            @if( ! empty($capa_cat))
		               @foreach($capa_cat as $imagem)
		                    <div class="img-thumbnail" style="padding: 8px; margin: 20px 10px">
		                            <center>
		                                <a class="fancybox" data-fancybox-group="gallery" href="{{ asset($imagem) }}" >
		                                    <img src="{{ asset($imagem) }}" style="width: 150px;"  />
		                                </a>
		                            </center>
		
		                        <?php $imagem=str_replace("capa_categorias/","",$imagem);?>
								<?php $imagem=str_replace("/","*",$imagem);?>
		                        <center><a href="{{route('recolocar_capa_categoria',[$imagem])}}" class="lbl_selecionar">Utilizar esta</a></center>
		
		                    </div>
		                @endforeach
		            @endif
		        </div>
		    </div>
		</div>


</html>