@extends('app_site')


@section('album')
	<div id="s_infos_album">
        <h1 class="s_album_titulo">{{$album->titulo}}</h1> <!--  titulo album -->
      	<h3 class="s_album_descr">{{$album->descricao}}</h3> <!--  descr album -->
        <h4 class="s_album_categoria text-muted">Categoria: {{$categoria->titulo}} </h4> <!--  categoria album -->
	</div>
@endsection


@section('content')

<script src="{!! asset('layout/js/ownjs.js') !!}"></script>


    <!-- top navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                   <a class="navbar-brand page-scroll project_name" id="site_head" style="color: #fff;" href="#">BETO AMBROSIO</a>
            </div>      
            
		      <li class="dropdown navbar-brand">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$categoria->titulo}}
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          @foreach($albuns as $albun)
                	<li><a href={{"/albuns/categoria/".$categoria->id."/".$albun->id}}>{{$albun->titulo}}</a></li>
           		  @endforeach
		        </ul>
		      </li>
		         
        </div>
    </div>
    
    
    

        <div class="container">
        

        
            <div id="imagensGaleria">
                @foreach($imagens as $img)
                    <a class="fancybox" data-fancybox-group="gallery" href="{{str_replace('thumbs/','',asset($img))}}"><img src="{{asset($img)}}"/></a>
                @endforeach
            </div>
        </div>

        <script>
            $('#imagensGaleria').justifiedGallery({
                rowHeight : 180,
                lastRow : 'nojustify',
                margins : 5,
                sizeRangeSuffixes: {
                    lt100 : '_t',
                    lt240 : '_m',
                    lt320 : '_n',
                    lt500 : '',
                    lt640 : '_z',
                    lt1024 : '_b'
                }
            });
        </script>

  

@endsection