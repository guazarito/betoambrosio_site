@extends('app_adm')
@section('content')
    <script src="{!! asset('layout/js/ownjs.js') !!}"></script>

    <h1>Álbuns</h1>
    
    <div class="row">
        @if( sizeof($albuns)>0)

            @foreach($albuns as $album)
            <a href="" class="link_palestra">
            <div class="img-thumbnail thumb_album" style="padding: 15px; margin: 10px;" onmouseover="show_lapis({{$album->id}});" onmouseleave="hide_lapis({{$album->id}});" >
                <p class="categoria_album">Categoria: {{$album->category->titulo}}</p>

                <span class="lapis_edit" id="lapis_edit{{$album->id}}">
                    <a href="/adm/album/{{$album->id}}"  title="Editar {{$album->titulo}}" class="btn btn-default" >
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>


                    <a onclick="deleta_album({{$album->id}});"  class="btn btn-danger" title="Excluir {{$album->titulo}}">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>

                </span>

                <div class="img_edit_albuns">
                    <center>
                    @if (file_exists($album->capa))
                        <a href="/adm/album/{{$album->id}}"  title="Editar {{$album->titulo}}"> <img src="{{asset($album->capa)}}" style="width: 300px;"/></a>
                    @else
                        <a href="/adm/album/{{$album->id}}"  title="Editar {{$album->titulo}}"> <img src="{{asset("layout/img/sem-capa.png")}}" style="width: 300px;"/></a>
                    @endif
                    </center>

                </div>
                <a href="/adm/album/{{$album->id}}"  title="Editar {{$album->titulo}}"><p class="titulo_album">{{$album->titulo}}</p></a>
            </div>
            </a>
            @endforeach


        @else
            <div class="alert alert-warning">
                <p>Não existem albums. Crie um!</p>
            </div>
            {{ Form::button('Criar', array('class'=>'btn btn-success', 'id'=>'btn_voltar_upload_albuns')) }}
        @endif

    </div>

@endsection