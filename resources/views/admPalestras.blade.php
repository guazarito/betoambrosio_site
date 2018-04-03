@extends('app_adm')
@section('content')

	<script src="{!! asset('layout/js/moment.js') !!}"></script>

    <script src="{!! asset('layout/js/ownjs.js') !!}"></script>
    
    <script src="{!! asset('layout/js/bootstrap_dtpiker.js') !!}"></script>


    <h1>Palestras</h1>

    <br>

	<!--
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
-->
    <br>
    @if(Session::has('error'))
    
			<div class="alert alert-warning">
               <p class="errors">{!! Session::get('error') !!}</p>
        	</div>

    @endif
    

                <a href="#" title="Clique para editar" class="editable_field" data-type="textarea" data-pk="{{$palestra->id}}" data-url="{{ route('adm.edita_palestra_inline', ['descricao',$palestra->id])}}">{{$palestra->descricao}}</a>

				
		<div id="adm_control" style="margin-top: 20px;">

                <span class="file-wrapper">                   
                    <a href="{{asset('adm/enviafotos_palestras/1')}}" class="btn btn-success" id="iframe" >Adicionar fotos</a>
                </span>
                <span class="file-wrapper2">
                    {!! Form::button('Selecionar todas', array('class'=>'btn btn-default', 'id'=>'btn_selall')) !!}
                    {!! Form::button('Excluir selecionadas', array('class'=>'btn btn-danger', 'id'=>'btn_excluisel_pal')) !!}
                </span>

        </div>
		
        @if( ! empty($imagens))
             <p class="qtde_imgs">{{sizeof($imagens)}} Imagen(s)</p>
        @else
            <p class="qtde_imgs">Nenhuma imagem !</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        @endif

            <div id="qtde_selecionadas"></div>


        <div class="row">
            @if( ! empty($imagens))
                <?php $i=1;
                       $check_rdo =false;
                ?>
                 @foreach($imagens as $imagem)


                        <div class="col-md-2 img-thumbnail" style="padding: 8px; margin: 10px">
                            <div class="img_edit"  >
                                

                                <center>
                                    <a class="fancybox" data-fancybox-group="gallery" href="{{ str_replace('thumbs/','',asset($imagem)) }}" >
                                        <img src="{{ asset($imagem) }}" style="width: 150px;"  />
                                    </a>
                                </center>
                            </div>

                            <center><p class="lbl_selecionar">{!! Form::checkbox('chk_img_select', $imagem,null,['class'=>'chkimgselect']) !!} Selecionar</p></center>

                        </div>
                    <?php $i=$i+1 ;?>
                @endforeach
            @endif
        </div>
				

				<!--<a href="{{asset('adm/editafotos_palestras/'.$palestra->id)}}" class="btn btn-success" id="iframe_palestras">Imagens</a>-->



@endsection



