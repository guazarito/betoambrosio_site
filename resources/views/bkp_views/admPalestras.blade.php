@extends('app_adm')
@section('content')

	<script src="{!! asset('layout/js/moment.js') !!}"></script>

    <script src="{!! asset('layout/js/ownjs.js') !!}"></script>
    
    <script src="{!! asset('layout/js/bootstrap_dtpiker.js') !!}"></script>

                    <script type="text/javascript">
				            $(function () {
				                $('#datetimepicker1').datetimepicker({

				                	format: 'DD/MM/YYYY HH:mm'
				                    
					             });
				            });
       				</script>    

    <h1>Palestras</h1>

    <br>

    <div id="adm_control">
    
    <script type="text/javascript">
    $('#txt_descricao_palestra').keyup(function() {
        alert('a');
    	  $("#txt_descricao_palestra").html(this.value.replace(/\n/g, '<br/>'));
    	});
	</script>
    
            <h5>Adicionar nova Palestra:</h5>
            <table class="table">
                {!! Form::open(['method'=>'POST','url'=>route('admCriaPalestra'), 'files'=>true]) !!}
                
                <td>{!! Form::text('local_palestra',null,['class'=>'form-control', 'id'=>'txt_local_palestra', 'placeholder'=>'Local']) !!}</td>
                <td>{!! Form::textarea('descricao_palestra',null,['class'=>'form-control', 'id'=>'txt_descricao_palestra', 'placeholder'=>'Descrição']) !!}</td>
                <td>
		            <div class="form-group">
		                <div class='input-group date' id='datetimepicker1'>
		                    <input type='text' class="form-control" id="txt_data_palestra" name="data_palestra" placeholder="selecione data e hora        ->"/>
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            </div>
            	</td>
				<td>
	                  <div class="form-group">
	                     {!! Form::label('Imagem:',null,['class' => 'control-label']) !!}
	                     {!! Form::file('image') !!}
	                     <p class="help-block">Selecione</p>
					  </div>
                </td>
                <td>
                {!! Form::submit('Salvar nova palestra', ['class'=>'btn btn-success']) !!}
                </td>
                

                {!! Form::close() !!}
            </table>
            
                        

				
    </div>

    <br>
    @if(Session::has('error'))
    
			<div class="alert alert-warning">
               <p class="errors">{!! Session::get('error') !!}</p>
        	</div>

    @endif
    



    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Local</th>
            <th>Descrição</th>
            <th>Data / Hora</th>
            <th>Imagem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($palestras as $palestra)
        <tr>
            <td>
                <a href="#" title="Clique para editar" class="editable_field" data-type="text" data-pk="{{$palestra->id}}" data-url="{{ route('adm.edita_palestra_inline', ['local',$palestra->id])}}">{{$palestra->local}}</a>
            </td>
            <td>
                <a href="#" title="Clique para editar" class="editable_field" data-type="textarea" data-pk="{{$palestra->id}}" data-url="{{ route('adm.edita_palestra_inline', ['descricao',$palestra->id])}}">{{$palestra->descricao}}</a>
            </td>
            <td>
				<a href="#" data-type="combodate" class="palestra_dt_editable" data-template="DD/MM/YYYY - HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="DD/MM/YYYY - HH:mm" data-pk="{{$palestra->id}}"  data-url="{{ route('adm.edita_palestra_inline', ['data',$palestra->id])}}" data-title="Clique para editar" data-value='{{$palestra->data}}'></a>
            </td>
            
            <?php 
            
            $dir = "layout/img/palestras/$palestra->id";
            if (file_exists($dir)){
           		$files = glob($dir.'/*.{jpg,png,gif,jpeg,bmp,PNG,JPG,JPEG,GIF,BMP}', GLOB_BRACE);
			?>
            
            
           	<td>
           	  <!--  <form method="POST" action="altera_img_palestra/$palestra->id" accept-charset="UTF-8" role="form" id="" enctype="multipart/form-data">
	                <img src='{{asset("$files[0]")}}' width="100"/>
	                <input type="file" id="upload" name="upload" style="visibility: hidden; width: 1px; height: 1px" multiple />
					<a href="" onclick="document.getElementById('upload').click(); return false">Upload</a>
	                <a href="#">Trocar imagem</a>
                </form>  --> 
                
	             <span class="file-wrapper" >
	                <form method="POST" action="altera_img_palestra/{{$palestra->id}}" accept-charset="UTF-8" role="form" id="Frm_altera_img_palestra" enctype="multipart/form-data">
	                <img src='{{asset("$files[0]")}}' width="100"/>
	                <input id="btn_altera_img_palestra" name="image" type="file">
	                <br>
			                   <a href="#">Trocar imagem</a>
			              
	                </form>
	            </span>
            </td>
            
            <?php
            }
            ?>
            
            <td>
                <a href="{{asset('adm/delete_palestra/'.$palestra->id)}}" class="btn btn-danger">Deletar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


@endsection



