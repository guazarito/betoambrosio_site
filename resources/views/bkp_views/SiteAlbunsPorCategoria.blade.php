@extends('app_site')




@section('content')

    <!-- top navbar -->
    <div class="navbar navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
            <!--
                <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->

                <a class="navbar-brand page-scroll project_name" href="#" id="site_head">BETO AMBROSIO</a>
            </div>
        </div>
    </div>
    
    
    <div class="container" style="background-color: #000;">
    
	    <div class="row">
	    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	    		<h1 class="s_categoria_titulo">{{$categoria->titulo}}</h1>
	    	</div>
	    </div>
	    
        <div class="row">
        	
            @if( ! empty($albuns))
			
				@foreach($albuns as $album)
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				  <center>
				  <div class="img-thumb-container">
				  
					     <div class="img-thumb">
		                      <div class="img_capa_album col-centered">
								   @if (file_exists($album->capa))
		                              <a href="{{asset('albuns/categoria/'.$categoria->id."/".$album->id)}}"  title="{{$album->titulo}}"> <img src="{{asset($album->capa)}}" /></a>
		                           @else
		                               <a href="{{asset('albuns/categoria/'.$categoria->id."/".$album->id)}}"  title="{{$album->titulo}}"> <img  src="{{asset("layout/img/sem-capa.png")}}"/></a>
		                           @endif

		                      </div><!-- img_capa_album -->

		                      
		                 </div><!-- img-thumb -->    
		                 
		                 		                      		<div class="s_titulo_album">
                               		  <a href="{{asset('albuns/categoria/'.$categoria->id."/".$album->id)}}"  title="Editar {{$album->titulo}}">{{$album->titulo}}</a>
                            	   </div>
		                
	                     
                  </div><!-- img-thumb-container -->    
                  </center>
              	</div> <!-- col -->
				@endforeach
			
			@endif
		
		</div>  
 	</div> <!--/.container-->
@endsection