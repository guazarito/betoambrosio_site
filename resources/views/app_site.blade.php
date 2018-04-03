<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Beto Ambrosio </title>
    
	
	@yield('meta_tags')

       
	<link rel="apple-touch-icon" sizes="57x57" href="{!! asset('icon2/apple-icon-57x57.png') !!}">
	<link rel="apple-touch-icon" sizes="60x60" href="{!! asset('icon2/apple-icon-60x60.png') !!}">
	<link rel="apple-touch-icon" sizes="72x72" href="{!! asset('icon2/apple-icon-72x72.png') !!}">
	<link rel="apple-touch-icon" sizes="76x76" href="{!! asset('icon2/apple-icon-76x76.png') !!}">
	<link rel="apple-touch-icon" sizes="114x114" href="{!! asset('icon2/apple-icon-114x114.png') !!}">
	<link rel="apple-touch-icon" sizes="120x120" href="{!! asset('icon2/apple-icon-120x120.png') !!}">
	<link rel="apple-touch-icon" sizes="144x144" href="{!! asset('icon2/apple-icon-144x144.png') !!}">
	<link rel="apple-touch-icon" sizes="152x152" href="{!! asset('icon2/apple-icon-152x152.png') !!}">
	<link rel="apple-touch-icon" sizes="180x180" href="{!! asset('icon2/apple-icon-180x180.png') !!}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{!! asset('icon2/apple-icon-192x192.png') !!}">
	<link rel="icon" type="image/png" sizes="32x32" href="{!! asset('icon2/favicon-32x32.png') !!}">
	<link rel="icon" type="image/png" sizes="96x96" href="{!! asset('icon2/favicon-96x96.png') !!}">
	<link rel="icon" type="image/png" sizes="16x16" href="{!! asset('icon2/favicon-16x16.png') !!}">
	<link rel="manifest" href="{!! asset('icon2/manifest.json') !!}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{!! asset('icon2/ms-icon-144x144.png') !!}">
	<meta name="theme-color" content="#ffffff">
	   
    <link href="{!! asset('layout/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    

    <script src="{!! asset('layout/js/jquery.js') !!}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('layout/css/bootstrap.css') !!}" rel="stylesheet">

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('layout/js/bootstrap.js') !!}"></script>

   
    <link href="{!! asset('layout/css/owncss.css') !!}" rel="stylesheet">

	<script src="{!! asset('layout/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
    <script src="{!! asset('layout/fancyBox/source/jquery.fancybox.js?v=2.1.5') !!}"></script>
    <link href="{!! asset('layout/fancyBox/source/jquery.fancybox.css?v=2.1.5') !!}" rel="stylesheet">
    
    <script src="{!! asset('layout/js/jquery.justifiedGallery.js') !!}"></script>
    <link href="{!! asset('layout/css/justifiedGallery.css') !!}" rel="stylesheet">
    

    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle=offcanvas]').click(function() {
                $('.row-offcanvas').toggleClass('active');
            });


            $('*').bind('contextmenu', function(e) {
                return false;
            }); 
        });
   
    </script>

</head>

<body >

@yield('album')

<div class="page-container" style="background-color: #000;">
    
    @yield('content')

</div><!--/.page-container-->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; www.betoambrosio.com.br
				</br></br>
				Desenvolvidor por <a href="mailto:guazarito@gmail.com" style="color: #000;">Gustavo Azarito</a>
				</span>
				
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

</body>