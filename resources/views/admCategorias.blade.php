@extends('app_adm')
@section('content')

    <script src="{!! asset('layout/js/ownjs.js') !!}"></script>

    <h1>Categorias</h1>

    <br>

    <div id="adm_control">
            <h5>Criar nova categoria:</h5>
            <table class="table">
                {!! Form::open(['method'=>'POST','url'=>route('admCriaCategoria')]) !!}
                <td>{!! Form::text('new_category',null,['class'=>'form-control', 'id'=>'txt_new_category', 'placeholder'=>'Categoria']) !!}</td>
                <td>{!! Form::submit('Salvar nova categoria', ['class'=>'btn btn-success']) !!}</td>
                {!! Form::close() !!}
            </table>
    </div>

    <br>
    @if(Session::has('errors'))
        <div class="alert alert-warning">
        @foreach($errors->all() as $erro)
            <p class="errors">{!!   $erro !!}</p>
        @endforeach
        </div>
    @endif



    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Categoria</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>
                <a href="#" title="Clique para editar" class="editable_field" data-type="text" data-pk="{{$categoria->id}}" data-url="{{ route('adm.edita_categoria_inline', $categoria->id)}}">{{$categoria->titulo}}</a>

            </td>
            <td>
				<a href="{{route('admCapaCategoria',$categoria->id)}}" class="btn btn-info" id="iframe">Imagem capa</a>
                <a href="{{asset('adm/delete_categoria/'.$categoria->id)}}" class="btn btn-danger">Deletar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


@endsection



