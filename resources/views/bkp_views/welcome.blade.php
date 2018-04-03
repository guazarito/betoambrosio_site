<?php 
	function get_mes($num_mes){
		switch ($num_mes) {
			case 1:
					return "JAN";
					break;
			case 2:
					return "FEV";
					break;
			case 3:
					return "MAR";
					break;				
			case 4:
				return "ABR";
				break;
			case 5:
				return "MAI";
				break;
			case 6:
				return "JUN";
				break;					
				case 7:
					return "JUL";
					break;
				case 8:
					return "AGO";
					break;
				case 9:
					return "SET";
					break;
				case 10:
					return "OUT";
					break;
				case 11:
					return "NOV";
					break;
				case 12:
					return "DEZ";
					break;					
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beto Ambrosio</title>

	<meta property="og:url"    content="http://www.betoambrosio.com.br" />
	<meta property="og:type"   content="website" />
	<meta property="og:title"  content="Beto Ambrosio" />
	
	<!--  TODO -->
	@if( is_object($capa_site) )
		<meta property="og:image"  content="{{asset($capa_site->capa)}}" />
	@endif
	
	

	<script src="{!! asset('layout/js/jquery.js') !!}"></script>
	<script src="{!! asset('layout/js/index.js') !!}"></script>
	<script src="{!! asset('layout/fancyBox/source/jquery.fancybox.js?v=2.1.5') !!}"></script>
	<script src="{!! asset('layout/bxSlider/jquery.bxslider.js') !!}"></script>
  
    <link href="{!! asset('layout/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('layout/css/agency.css') !!}" rel="stylesheet">
    <link href="{!! asset('layout/css/index.css') !!}" rel="stylesheet">
    <link href="{!! asset('layout/bxSlider/jquery.bxslider.css') !!}" rel="stylesheet">
    
    <link href="{!! asset('layout/fancyBox/source/jquery.fancybox.css?v=2.1.5') !!}" rel="stylesheet">

    <link href="{!! asset('layout/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
	<link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="icon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="icon/manifest.json">
	<link rel="mask-icon" href="icon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">



    <style>
    /*
        header{
        
        	@if( is_object($capa_site) )
				background-image:url( {{asset($capa_site->capa)}} );
            @else
           		background-image:url( {{asset('layout/img/no-image.jpg')}} );
           	@endif
         
        }
   */
   
   
		.navbar-default .nav li a{ 
			@if( is_object($colors) )
				color: #{{$colors->menu}} ;
			@else
				color: #fff ;
			@endif
		}
		
		.navbar-default .nav li a:hover,.navbar-default .nav li a:focus{ 
			@if( is_object($colors) )
				color: #{{$colors->menu_hover}};
			@else
				color: #fec503 ;
			@endif
		}
		
		.navbar-default.navbar-shrink li a{
			color: #fff;
		}
			
		.navbar-default.navbar-shrink li a:hover{
			color: #fec503;
		}		
		
		
	 </style>

</head>



<body id="page-top" class="index">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86032897-1', 'auto');
  ga('send', 'pageview');

</script>



<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top" style="font-size: 3.5em;">BETO AMBROSIO</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#sobre">Sobre</a>
                </li>
                <li>
                    <a class="page-scroll" href="#roteiro">América Latina</a>
                </li>
                <li>
                    <a class="page-scroll" href="#portfolio">Portfolio</a>
                </li>
                <li>
                    <a class="page-scroll" href="#palestras">Palestras</a>
                </li>
				<li>
                    <a class="page-scroll" href="#livro">Livro</a>
                </li>
				<li>
                    <a class="page-scroll" href="#loja">Loja</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contato</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>

	<div id="slider_header">
		<ul class="bxslider"> 
		
			 @foreach($capa_site as $capa)
				 <li><img style="width: 100%; margin: 0; padding: 0; border: none;" src="{{$capa}}" /></li>
		     @endforeach
		
		</ul> 
	</div>

		
    <div class="container">
        <div class="intro-text">
       	  @if( is_object($capa_texto_site) )
       	  		@if( is_object($colors) )
					<div class="intro-lead-in" style="color: #{{$colors->capa_parte1}}; text-shadow: 2px 2px 4px #000;" >{!! $capa_texto_site->texto_parte1 !!}</div>
				    <div class="intro-heading" style="padding-top: 12px; color: #{{$colors->capa_parte2}}; text-shadow: 2px 2px 4px #000;">{!! $capa_texto_site->texto_parte2 !!}</div>
				@else
					<div class="intro-lead-in">{!! $capa_texto_site->texto_parte1 !!}</div>
					<div class="intro-heading" style="padding-top: 12px;">{!! $capa_texto_site->texto_parte2 !!}</div>
				@endif
          @endif
        </div>
    </div>
</header>


<section id="sobre" >
    <div class="container">
    
         <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" >Sobre</h2>
                @if( is_object($sobre) )
	                @if( ($sobre->subtitulo) != "" )
	               		<h3 class="section-subheading text-muted" >{{$sobre->subtitulo}}</h3>
	                @endif
				@endif
            </div>
        </div>
        
        
        <div class="row">
        
        	<div class="col-lg-7">
        		<div id="imgs_sobre">
        		   	  
        		   	  <?php
        		   	  if( is_object($sobre) && file_exists('./'.$sobre->sobre)){
	        		   	  list($width, $height) = getimagesize('./'.$sobre->sobre);
	        		   	  $classe_imagem = "img_sobre";
	        		   	  if($width < $height){
	        		   	  	$classe_imagem = "img_sobre_v";
	        		   	  }
        		   	  }else{
        		   	  	 $classe_imagem = "img_sobre";
        		   	  }
        		   	  ?>
        		   
        		    @if( is_object($sobre) && file_exists('./'.$sobre->sobre) )
        				<img src="{{$sobre->sobre}}" class="img-responsive {{$classe_imagem}}">
        			@else
        				<img src="{{asset('layout/img/no-image.jpg')}}" class="img-responsive {{$classe_imagem}}">
        			@endif
        		    
        		</div><!-- imgs_sobre  -->
        	</div><!-- col-lg-7 -->
        	
        	<div class="col-lg-5 sobre_pt1">
        	  @if( is_object($sobre) )
				<p class="text-muted" >{!!nl2br($sobre->texto_parte1)!!}</p>
				<p class="text-muted" >{!!nl2br($sobre->texto_parte2)!!}</p>
				<p class="text-muted" >{!!nl2br($sobre->texto_parte3)!!}</p>
			  @endif	
        	</div><!-- col-lg-5 -->
        	
		</div><!-- row -->
		

    </div><!-- container -->
</section>



<section id="roteiro" style="background-color: #395E70;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" style="color: #fff;">ROTEIRO</h2>
                <h3 class="section-subheading text-muted" style="color:#e7d151;">Uma volta pela América Latina de bicicleta</h3>
            </div>
        </div>
        <div class="row">
            <div id="roteiro_info" class="col-lg-2 col-md-12 col-sm-12" style="color: #fff;">
        		<h3>17 países</h3>
        		<h3>25.160 km</h3>
        		<h3>2 anos, 8 meses e 13 dias</h3>
        	</div>
        	<div class="col-lg-8 col-md-12 col-sm-12">
        		<img src="{!! asset('layout/img/americalatina_beto.png') !!}" class="img-responsive" alt="" width="80%">
        	</div>
        	<div id="roteiro_info" class="col-lg-2 col-md-12 col-sm-12" style="color: #fff;">
        		<h2>Clique <a href="https://www.facebook.com/vestigiodeaventura/photos/?tab=album&album_id=457420587705318" target="_blank">aqui</a> e leia os diários!</h2>
        	</div>
        </div><!-- row -->
    </div>
</section>

<!-- Portfolio  -->
<section id="portfolio" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" >Portfolio</h2>
                <h3 class="section-subheading text-muted" >Fotografia</h3>
            </div>
        </div>
        <div class="row">
            @foreach($categorias as $categoria)
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="albuns/categoria/{{$categoria->id}}" class="portfolio-link" target="_blank">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                         @if (file_exists($capa_albuns_random[$categoria->id]))
                        	<img src="{!! str_replace('thumbs/','',asset($capa_albuns_random[$categoria->id])) !!}" class="img-responsive" alt="">
                         @else
                         	<img src="layout/img/no-image.jpg" class="img-responsive" alt="">
                         @endif
                        
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{$categoria->titulo}}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section id="palestras" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Palestras</h2>
            </div>
        </div>
        
         <div class="container-fluid">
         
         @foreach($palestras as $palestra)
        
			<div class="row palestra_content" onclick='ver_mais_palestra("{{asset("palestras/$palestra->id")}}")' onmouseover="hover_in_palestra({{$palestra->id}})" onmouseout="hover_out_palestra({{$palestra->id}})">
				 
					<div class="col-lg-1 col-md-1"></div>
		            <div class="col-lg-1 col-md-2 col-sm-12 text-center" id="data_palestra">
		                <div class="row">
		                	<div id="mes_palestra">{{get_mes(date("m",strtotime($palestra->data)))}}</div>
		                	<div id="dia_palestra">{{ date("d",strtotime($palestra->data)) }}</div>
		                	<div id="ano_palestra">{{ date("Y",strtotime($palestra->data)) }}</div>
		                </div>
		            </div>
		            <div class="col-lg-10 col-md-9 col-sm-12 bg-light-gray" id="info_palestra" >
		            	<div id="hora_palestra"><b>Início:</b> {{ date("H:i",strtotime($palestra->data)) }}</div>
		                <div id="local_palestra">{{ $palestra->local }}</div>
		                <div id="descricao_palestra">
		                	{{ substr($palestra->descricao, 0, 104) }} 
		                	
		                	@if (strlen($palestra->descricao) > 104)
		                	(...)
		                	@endif
		                	
		                	<span class="glyphicon glyphicon-plus-sign veja_mais" id="veja_mais{{$palestra->id}}"></span>
		                </div>
		            </div> 
	        </div>
	    
	      @endforeach
	        
         </div>
         
      
         
         
    </div>
</section>



<section id="livro">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Livro</h2>
                <h3 class="section-subheading text-muted">Em breve...</h3>
            </div>
        </div>
    </div>
</section>

<section id="loja" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Loja</h2>
                <h3 class="section-subheading text-muted">Em breve...</h3>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contato</h2>
                <h3 class="section-subheading text-muted" style="color:#e7d151;">Envie sua mensagem para nós.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Seu nome *" id="name"  required data-validation-required-message="Coloque seu nome.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Seu Email *" id="email"  required data-validation-required-message="Coloque seu email.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Seu Telefone *" id="phone" required data-validation-required-message="Coloque seu telefone"  >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Sua Mensagem *" id="message"  required data-validation-required-message="Digite sua mensagem."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="button" onclick="sendmail()" class="btn btn-xl">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; www.betoambrosio.com.br</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                	<li><a href="http://www.facebook.com/betoambrosiofoto/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="http://www.instagram.com/betoambrosiofoto/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4" id="facebook">
				<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fbetoambrosiofoto&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=405246922874434" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			</div>
        </div>
    </div>
</footer>





<!-- Bootstrap Core JavaScript -->
<script src="{!! asset('layout/js/bootstrap.min.js') !!}"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{!! asset('layout/js/classie.js') !!}"></script>
<script src="{!! asset('layout/js/cbpAnimatedHeader.js') !!}"></script>

<!-- Contact Form JavaScript -->
<script src="{!! asset('layout/js/cbpAnimatedHeader.js') !!}"></script>
<script src="{!! asset('layout/js/contact_me.js') !!}"></script>

<!-- Custom Theme JavaScript -->
<script src="{!! asset('layout/js/agency.js') !!}"></script>


<script>
$(document).ready(function(){

	
	  $('.bxslider').bxSlider({
				auto: true,
				controls: true,	
				pager: false,
				mode: 'fade',
				preloadImages: 'all'
		  });
	});


	
</script>



</body>

</html>
