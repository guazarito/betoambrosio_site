<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beto Ambrosio - ADM Area</title>

    <!-- Custom Fonts -->
    <link href="{!! asset('layout/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- jQuerIes -->
    <script src="{!! asset('layout/js/jquery.js') !!}"></script>

    <link href="{!! asset('layout/css/jqueryLoader.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/js/jqueryLoader.js') !!}"></script>
    
    <link href="{!! asset('layout/css/spectrum.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/js/spectrum.js') !!}"></script>

    <script src="{!! asset('layout/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
    <script src="{!! asset('layout/fancyBox/source/jquery.fancybox.js?v=2.1.5') !!}"></script>
    <link href="{!! asset('layout/fancyBox/source/jquery.fancybox.css?v=2.1.5') !!}" rel="stylesheet">



    <link href="{!! asset('layout/css/owncss.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/js/ownjs.js') !!}"></script>

    <!-- editable fields -->
    <link href="{!! asset('layout/editable_fields/css/bootstrap-editable.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/editable_fields/js/bootstrap-editable.js') !!}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('layout/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('layout/css/agency.css') !!}" rel="stylesheet">
    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('layout/js/bootstrap.min.js') !!}"></script>

	<script src="{!! asset('layout/bxSlider/jquery.bxslider.js') !!}"></script>
	<link href="{!! asset('layout/bxSlider/jquery.bxslider.css') !!}" rel="stylesheet">

<style> 
 @if( is_object($colors) )
 	#menu_superior {color : #{{$colors->menu}};}
 	#menu_superior:hover {color : #{{$colors->menu_hover}};}
 @else
 	#menu_superior {color : #fff;}
	#menu_superior:hover {color : #fec503;}
@endif
</style>


</head>

<body id="page-top" class="index">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">

            </a>

            <ul class="nav navbar-nav">
                <li><a href="">Home</a></li>
                <li><a href="{{route('lista_categorias')}}">Categorias</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Álbuns <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admCriarAlbum')}}">Criar novo</a></li>
                        <li><a href="{{route('lista_albuns')}}">Ver todos</a></li>
                    </ul>
                </li>
                <li><a href="{{route('adm.edita_about')}}">Sobre</a></li>
                <li><a href="{{route('lista_palestras')}}">Palestras</a></li>
            </ul>
            
            <ul class="nav navbar-nav">
            	<li><a href="adm/logout" style="color: #e7d151; text-decoration: underline;">Sair</a></li>
            </ul>

        </div>
    </div>
</nav>


<!-- Header -->
<header>

	<div id="slider_header" style="background: linear-gradient(141deg, #000 0%, #513E00 51%, #000 95%);">
		<ul class="bxslider"> 
		
			 @foreach($capa_site as $capa)
				 <li><img class="li_img_capa" style="width: auto; margin: 0 auto; padding: 0; border: none;" src="{{$capa}}" /></li>
		     @endforeach
		 
		
		</ul> 
	</div>

    <div class="container">
        <div class="intro-text">
         @if( is_object($capa_site_textos) )
         	
         	<?php 
         	
         	$style1 = "";
         	$style2 = "";
         	$style_menu = "style='color:#fff;'";
         	
         		if (is_object($colors)){
         			$style1 = "style='color:#".$colors->capa_parte1.";'"; 
         			$style2 = "style='color:#".$colors->capa_parte2.";'";
         		} 
         		
         	?>
         	
       		<div class="intro-lead-in">
       			<a id="menu_superior" href="#" ><h2>Cor do Menu superior:</h2></a>
       		    Cor: <input type='text' class="menu_cor"/>
       			 Cor ao passar mouse: <input type='text' class="menu_cor_hover"/>
       			<br><br>
       		</div>
         	
            <div class="intro-lead-in">
            <a href="#" class="editable_field editable_field_" id="capa_texto1" {!!$style1!!} data-emptytext='Clique para definir o texto' data-type="textarea" data-pk="1" data-url="{{ route('adm.edita_textos_capa_inline', ['campo' => 'texto_parte1'])}}" title="Clique para editar">{{$capa_site_textos->texto_parte1}}</a>
                    <input type='text' class="basic1"/><!-- color picker -->
			</div>
            
            <div class="intro-heading"><a href="#" id="capa_texto2" {!!$style2!!} class="editable_field editable_field_" data-emptytext='Clique para definir o texto' data-type="textarea" data-pk="1" data-url="{{ route('adm.edita_textos_capa_inline', ['campo' => 'texto_parte2']) }}" title="Clique para editar">{{$capa_site_textos->texto_parte2}}</a>
                    <input type='text' class="basic2"/><!-- color picker -->
            </div>
            
         @else
            <div class="intro-lead-in" ><a href="#" id="capa_texto1" class="editable_field editable_field_" style="color:black;" data-emptytext='Clique para definir o texto' data-type="textarea" data-pk="1" data-url="{{ route('adm.edita_textos_capa_inline', ['campo' => 'texto_parte1'])}}" title="Clique para editar">definir texto</a>
                    <input type='text' class="basic1"/><!-- color picker -->
				
            </div>
            <div class="intro-heading"><a href="#" id="capa_texto2" class="editable_field editable_field_" style="color:black;" data-emptytext='Clique para definir o texto' data-type="textarea" data-pk="1" data-url="{{ route('adm.edita_textos_capa_inline', ['campo' => 'texto_parte2']) }}" title="Clique para editar">definir texto</a>
                    <input type='text' class="basic2"/><!-- color picker -->
            </div>
		 @endif            
           
           

            @if(Session::has('errors'))
                <div class="alert alert-warning">
                    @foreach($errors->all() as $erro)
                        <p class="errors">{!!   $erro !!}</p>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</header>

<div class="container-fluid">

    <div id="capas_usadas">
        <h2>Imagens da capa:</h2>
        
        
                <div id="adm_control">
                  <span class="file-wrapper">
                {!! Form::open(array('url'=>route('altera_capa'),'method'=>'POST', 'files'=>true, 'role'=>'form', 'id'=>'Frm_altera_capa')) !!}
                {!! Form::file('images[]', array('multiple'=>true, 'id'=>'btn_altera_capa')) !!}
                {!! Form::button('Enviar imagens de capa', array('class'=>'btn btn-success')) !!}
                {!! Form::close() !!}
            </span>
                <span class="file-wrapper2">
                    {!! Form::button('Selecionar todas', array('class'=>'btn btn-default', 'id'=>'btn_selall')) !!}
                    {!! Form::button('Excluir selecionadas', array('class'=>'btn btn-danger', 'id'=>'btn_excluisel_capa')) !!}
                </span>

        </div>
        @if($capa_site[0]!='null') 
             <p class="qtde_imgs">{{sizeof($capa_site)}} Imagen(s)</p>
        @else
            <p class="qtde_imgs">Nenhuma imagem de capa!</p>
        @endif

            <div id="qtde_selecionadas"></div>
            
            
		     <div class="row">
		 
	        @if($capa_site[0]!='null') 
	                 @foreach($capa_site as $imagem)	
	                        <div class="col-md-2 img-thumbnail" style="padding: 8px; margin: 10px">
	                            <div class="img_edit"  >
	                                <center>
	                                    <a class="fancybox" data-fancybox-group="gallery" href="{{ str_replace('thumbs/','',asset($imagem)) }}" >
	                                        <img src="{{ asset($imagem) }}" style="width: 150px;"  />
	                                    </a>
	                                </center>
	                            </div>
	
	                            <center><p class="lbl_selecionar">{!! Form::checkbox('chk_img_select', $imagem,null,['class'=>'chkimgselect']) !!} Selecionar</p></center>
	
	                        </div>
	                @endforeach
	        @endif
	        </div>
        </div>

 
</div>

<!-- Plugin JavaScript -->
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
<script src="{!! asset('layout/js/classie.js') !!}"></script>
<script src="{!! asset('layout/js/cbpAnimatedHeader.js') !!}"></script>

<!-- Custom Theme JavaScript -->
<script src="{!! asset('layout/js/agency.js') !!}"></script>

<script>
$(document).ready(function(){
	  $('.bxslider').bxSlider({
				auto: true,
				controls: false,	
				pager: false,
				mode: 'fade'
		  });
			
			$('.li_img_capa').css("height", $( window ).height());
			$('#slider_header').css("height", $( window ).height());
			$('.intro-text').css("position", "absolute");
			$('.intro-text').css("top", $( window ).height()/2-70 + "px");
			$('.intro-text').css("left", ($( window ).width()/2)-212 + "px");
	});
</script>
</body>

</html>
