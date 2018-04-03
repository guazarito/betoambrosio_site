<!DOCTYPE html>
<html lang="en">

<head>



<style type="text/css">

	@font-face {
	    font-family: 'italo'; 
	    src: url("{{asset('layout/fonts/ITALO_regular.ttf')}}"); 
	}
	
	body{
		padding: 2em;
	}
	
        	

	
	#img_palestra img{
		width: 450px;
	}
	
	#img_palestra{
		padding: 0 100px 0 0;
		
	}
		

	
	#info_palestra h1{
		font-family: "italo";
		text-transform: uppercase;
		font-size: 4em;
		margin: 0;
		padding: 0;
		margin-bottom: 0.3em;
		
	}
	
	#info_palestra h1 b{
		color: #000;
	}
	
	#info_palestra h2{
		font-family: "italo";
		text-transform: uppercase;
		font-size: 2.5em;
		margin: 0;
		padding: 0;
	}
	
	
	#info_palestra p{
		font-family: Trebuchet MS,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Tahoma,sans-serif; ;
		font-size: 1em;
		margin: 0;
		margin-top: 1em;
		padding: 0;
	}
	
	
	.demo-gallery ul{
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	
	.demo-gallery ul li{
		display: inline;
		float: left;
		width: 200px;
		height: 130px;
		overflow: hidden;
		margin: 0 2px 3px 0;
		
	}
	
	.demo-gallery ul li a
	{

	}
	
            .demo-gallery > ul > li a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
			
			            .demo-gallery > ul > li a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
			

	
</style>

<script src="{!! asset('layout/js/jquery.js') !!}"></script>
<link href="{!! asset('layout/css/bootstrap.min.css') !!}" rel="stylesheet">
<script src="{!! asset('layout/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('layout/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
<script src="{!! asset('layout/fancyBox/source/jquery.fancybox.js?v=2.1.5') !!}"></script>
<link href="{!! asset('layout/fancyBox/source/jquery.fancybox.css?v=2.1.5') !!}" rel="stylesheet">
<!--<link href="{!! asset('layout/galeria_palestras/css/style_galery.css') !!}" rel="stylesheet">-->

</head>


<body style="background-color:#f0f0f0;">

<div class="container" >
    
		<?php 
			
			$data = date('d/m/Y', strtotime(substr($palestra->data,0,10)));
			
			$hora = substr($palestra->data,11,5);
			
		?>
		
	

		@if( ! empty($imagens))
			<div class="demo-gallery" style="background-color:red; " >
				
			<ul>
				   @foreach($imagens as $img) 
				   <li>
				    
						<a class="fancybox"  data-fancybox-group="gallery" href="{{str_replace('thumbs/','',asset($img))}}">
							<img class="img-responsive" src="{{asset($img)}}">
						</a>
				
					</li>
				   @endforeach
				
			</ul>
			</div>
		@endif
		
</div><!-- container -->
	
	<div class="container" >
	<div class="row">	
			<div class="col-lg-6 col-md-6 col-sm-12">
					<div id="info_palestra">
						<h1><b>Local: </b>{{$palestra->local}}</h1>
						<h2><b>Data: </b>{{$data}}</h2>
						<h2><b>Hora: </b>{{$hora}}</h2>
						
					</div>

			</div> <!-- col -->		
			
				<div class="col-lg-12 col-md-12 col-sm-12">
				<div id="info_palestra">
					<p>{!!$palestra->descricao!!}</p>
				</div>
				</div>
	</div><!-- row -->
	
</div><!-- container -->

<script type="text/javascript">
			$(document).ready(function() {
					$('.fancybox').fancybox();			
			});
</script>
		
</body>

</html>
		

	