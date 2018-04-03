@extends('app_adm')
@section('content')
    <div class="content">
        <div class="about-section">
            <div class="text-content">
                <div class="span7 offset1">

                    @if(Session::has('error'))
                        <div class="alert alert-warning">
                            <p class="errors">{!! Session::get('error') !!}</p>
                        </div>
                    @endif

                    <div class="secure"><h2>Criar álbum</h2></div>
                    {!! Form::open(array('url'=>route('uploadImgs'),'method'=>'POST', 'files'=>true, 'role'=>'form')) !!}
                    <div class="control-group">
                        <div class="controls">

                            <div class="form-group">
                                {!! Form::label('Título:',null,['class' => 'control-label']) !!}
                                {!! Form::text('titulo',null,['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Descrição:',null,['class' => 'control-label']) !!}
                                {!! Form::textarea('descricao',null,['class' => 'form-control']) !!}
                            </div>


                            <div class="form-group">
                                 {!! Form::label('Imagens:',null,['class' => 'control-label']) !!}
                                 {!! Form::file('images[]', array('multiple'=>true)) !!}
                                 <p class="help-block">Selecione as imagens</p>
                            </div>

                            <div class="form-group">
                                {!! Form::label('Categoria:',null,['class' => 'control-label']) !!}
                                {{ Form::select('category_id', $categories,'0',['class'=>'form-control', 'name'=>'category_id'] ) }}
                            </div>

                        </div>
                    </div>
                    <div id="success"> </div>
                    {!! Form::submit('Salvar', array('class'=>'btn btn-success', 'id'=>'btn_salvar_album')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>
    $( "#btn_salvar_album" ).click(function() {
         $.loader({
           className:"Jloader",
           content:''
           });
    });
    </script>
@endsection
