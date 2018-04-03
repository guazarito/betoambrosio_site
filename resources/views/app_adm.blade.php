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

    <script src="{!! asset('layout/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
    <script src="{!! asset('layout/fancyBox/source/jquery.fancybox.js?v=2.1.5') !!}"></script>
    <link href="{!! asset('layout/fancyBox/source/jquery.fancybox.css?v=2.1.5') !!}" rel="stylesheet">

    <link href="{!! asset('layout/css/owncss.css') !!}" rel="stylesheet">

    <!-- editable fields -->
    <link href="{!! asset('layout/editable_fields/css/bootstrap-editable.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/editable_fields/js/bootstrap-editable.js') !!}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('layout/css/bootstrap.css') !!}" rel="stylesheet">

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('layout/js/bootstrap.js') !!}"></script>

    <!-- Custom CSS -->




</head>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">

            </a>

                <ul class="nav navbar-nav">
                    <?php 
                    	if(Auth::check()) {
                    ?>	
                    
                    <li class="active"><a href="{{url('/adm')}}">Home</a></li>
                    <li><a href="{{route('lista_categorias')}}">Categorias</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Álbuns <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('lista_albuns')}}">Ver todos</a></li>
                            <li><a href="{{route('admCriarAlbum')}}">Criar novo</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('adm.edita_about')}}">Sobre</a></li>
                    <li><a href="{{route('lista_palestras')}}">Palestras</a></li>
                </ul>
				<ul class="nav navbar-nav">
	            	<li><a href="{{url('adm/logout')}}" style="color: #e7d151; text-decoration: underline;">Sair</a></li>
	            	<?php 
                    	}
                    ?>		            
	            </ul>
	            	

        </div>
    </div>
</nav>

<body>

    <div class="container">
    <br><br><br>
        @yield('content')
    </div>


<footer>
    <div class="container">
    </div>
</footer>




<!-- Plugin JavaScript -->
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
<script src="{!! asset('layout/js/classie.js') !!}"></script>
<script src="{!! asset('layout/js/cbpAnimatedHeader.js') !!}"></script>

<!-- Custom Theme JavaScript -->
<script src="{!! asset('layout/js/agency.js') !!}"></script>

</body>

</html>
