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
	
        	
	<?php
		if ($img_palestra[0]!=""){
	        	list($width, $height) = getimagesize($img_palestra[0]);
        		
        		if($width < $height){
        		   	$classe_imagem = "img_sobre_v";
        		 }
		}

    ?>
	
	#img_palestra img{
		width: 500px;
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
		font-size: 1.5em;
		margin: 0;
		margin-top: 1em;
		padding: 0;
	}
</style>

<script src="{!! asset('layout/js/jquery.js') !!}"></script>
<link href="{!! asset('layout/css/bootstrap.min.css') !!}" rel="stylesheet">
<script src="{!! asset('layout/js/bootstrap.min.js') !!}"></script>

</head>


<body style="background-color:#f0f0f0;">

<div class="container">
    
	<div class="row">
	
		<?php 
			if ($img_palestra[0]==""){
				$cols = "col-lg-12 col-md-12 col-sm-12";
			}else{
				$cols = "col-lg-6 col-md-6 col-sm-12";
			}
			
			
			$data = date('d/m/Y', strtotime(substr($palestra->data,0,10)));
			
			$hora = substr($palestra->data,11,5);
			
		?>
		
		@if ($img_palestra[0]!="")
            <div class="{{$cols}}">
					<div id="img_palestra">
						<img alt="" src='{{asset("$img_palestra[0]")}}'>
					</div>
			</div> <!-- col -->		
		@endif
			
			<div class="{{$cols}}">
					<div id="info_palestra">
						<h1><b>Local: </b>{{$palestra->local}}</h1>
						<h2><b>Data: </b>{{$data}}</h2>
						<h2><b>Hora: </b>{{$hora}}</h2>
						<p>{!!$palestra->descricao!!}</p>
					</div>
			</div> <!-- col -->		
			
	</div><!-- row -->
	
</div><!-- container -->


</body>

</html>
		

	