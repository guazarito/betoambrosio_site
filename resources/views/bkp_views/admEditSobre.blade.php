
@extends('app_adm')



@section('content')

		
	<script src="{!! asset('layout/js/ownjs.js') !!}"></script>
		
	<section id="services">
    <div class="container">
    
           @if(Session::has('errors'))
                <div class="alert alert-warning">
                    @foreach($errors->all() as $erro)
                        <p class="errors">{!!   $erro !!}</p>
                    @endforeach
                </div>
            @endif
		              
         <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Sobre</h2>
                @if( ($sobre->subtitulo) != "" )
               		<a href="#" class="editable_field" data-emptytext='Clique para definir' data-type="textarea" data-pk="{{$sobre->id}}" data-url="{{ route('adm.edita_about_inline', ['subtitulo', $sobre->id]) }}" title="Clique para editar" style="font-size: 20px;">{{$sobre->subtitulo}}</a>
                @endif
            </div>
        </div>
        
	    <div class="container-fluid">
	    	<div id="capas_usadas">
		        <h4 class="text-muted">Imagens já utilizadas:</h4>
		        <br>
		        <div class="row" style="margin:auto;">
		            @if( ! empty($imagens))
		               @foreach($imagens as $imagem)
		                    <div class="img-thumbnail" style="padding: 8px; margin: 20px 10px">
		                            <center>
		                                <a class="fancybox" data-fancybox-group="gallery" href="{{ asset($imagem) }}" >
		                                    <img src="{{ asset($imagem) }}" style="width: 150px;"  />
		                                </a>
		                            </center>
		
		                        <?php $imagem=str_replace("/","*",$imagem);?>
		                        <center><a href="{{route('recolocar_sobre',[$imagem])}}" class="lbl_selecionar">Utilizar esta</a></center>
		
		                    </div>
		                @endforeach
		            @endif
		        </div>
		    </div>
		</div>
		
        <div class="row">
        
        	<div class="col-lg-7">
        		<div id="imgs_sobre">
        		   	  
        		   	  <?php 
        		   	  $classe_imagem = "img_sobre";
        		   	  if (file_exists ('./'.$sobre->sobre)){
	        		   	  list($width, $height) = getimagesize('./'.$sobre->sobre);
	        		   	  
	        		   	  $classe_imagem = "img_sobre";
	        		   	  
	        		   	  if($width < $height){
	        		   	  	$classe_imagem = "img_sobre_v";
	        		   	  }
        		   	  }
        		   	  ?>
        		   
        		     
		     <span class="file-wrapper" style="position: absolute;">
                <form method="POST" action="{{route('altera_img_about')}}" accept-charset="UTF-8" role="form" id="Frm_altera_capa" enctype="multipart/form-data">
                <input id="btn_altera_capa" name="image" type="file">
                        <span class="lapis_edit_" id="lapis_edit1">
		                    <button type="button" class="btn btn-default" >
		                        <span class="glyphicon glyphicon-pencil"></span>
		                    </button>	
		                </span>
                </form>
            </span>
		           @if( is_object($sobre) && file_exists('./'.$sobre->sobre) ) 
        			  <img src="../{{$sobre->sobre}}" class="img-responsive {{$classe_imagem}}">        
        		   @else
        		    <img src="../layout/img/no-image.jpg" class="img-responsive {{$classe_imagem}}"> 
        		   @endif
        		</div><!-- imgs_sobre  -->
        	</div><!-- col-lg-7 -->
        	
        	<div class="col-lg-5 sobre_pt1">
        	<br><br>
				<a href="#" class="editable_field" data-emptytext='Clique para definir' data-type="textarea" data-pk="{{$sobre->id}}" data-url="{{ route('adm.edita_about_inline', ['texto_parte1', $sobre->id]) }}" title="Clique para editar" style="font-size: 15px;">{{$sobre->texto_parte1}}</a>
			<br><br><a href="#" class="editable_field" data-emptytext='Clique para definir' data-type="textarea" data-pk="{{$sobre->id}}" data-url="{{ route('adm.edita_about_inline', ['texto_parte2', $sobre->id]) }}" title="Clique para editar" style="font-size: 15px;">{{$sobre->texto_parte2}}</a>
			<br><br><a href="#" class="editable_field" data-emptytext='Clique para definir' data-type="textarea" data-pk="{{$sobre->id}}" data-url="{{ route('adm.edita_about_inline', ['texto_parte3', $sobre->id]) }}" title="Clique para editar" style="font-size: 15px;">{{$sobre->texto_parte3}}</a>
			
        	</div><!-- col-lg-5 -->
        	
		</div><!-- row -->
		

		
    </div><!-- container -->
</section>
 
 
 

@endsection