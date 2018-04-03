
@extends('app_adm')



@section('content')



        <script src="{!! asset('layout/js/ownjs.js') !!}"></script>

        <div id="ablum_infos" >

            <div id="cover">
                <a class="fancybox" data-fancybox-group="gallery" href="{{ asset($infos_album->capa) }}" title="capa do album" >
                      @if (file_exists ($infos_album->capa))
                        <img src="{{ asset($infos_album->capa) }}"  />
                      @else
                        <img src="{{ asset('layout/img/sem-capa.png') }}"  />
                      @endif
                </a>
            </div>

            {!! Form::label('album_titulo', 'album: ') !!}
            <a href="#" class="editable_field" data-emptytext='Clique para definir o título do album' data-type="text" data-pk="{{$infos_album->id}}" data-url="{{ route('adm.edita_campos_inline', ['titulo', $infos_album->id]) }}" title="Clique para editar">{{$infos_album->titulo}}</a>
            <br>
            {!! Form::label('album_desc', 'Descrição: ') !!}
            <a href="#" class="editable_field" data-emptytext='Clique para definir a descrição do album' data-type="textarea" data-pk="{{$infos_album->id}}" data-url="{{ route('adm.edita_campos_inline', ['descricao', $infos_album->id]) }}" title="Clique para editar">{{$infos_album->descricao}}</a>
            <br>
            {!! Form::label('lbl_categoria', 'Categoria: ') !!}
            <a href="#"  id="cbo_categorias"  data-emptytext='Clique para definir a categoria do album' data-type="select" data-pk="{{$infos_album->id}}" data-url="{{ route('adm.edita_campos_inline', ['category_id', $infos_album->id]) }}" title="Clique para editar"></a>


            <script>
            
            $(function(){
                $('#cbo_categorias').editable({
                value:1,
                source: [
							@foreach($categorias as $categoria)
								{value: {{$categoria->id}}, text: '{!! $categoria-> titulo !!}'},
							@endforeach
                        ]
                });
            });
            </script>
            
        </div> <!-- informacoes do album -->

        <div id="adm_control">

                <span class="file-wrapper">
                    {!! Form::open(array('url'=>'adm/upload/'.$infos_album->id,'method'=>'POST', 'files'=>true, 'role'=>'form', 'id'=>'Frm_add_fotos_editAlbum')) !!}
                        {!! Form::file('images[]', array('multiple'=>true, 'id'=>'btn_add_fotos_editAlbum')) !!}
                        {!! Form::button('Adicionar fotos', array('class'=>'btn btn-success')) !!}
                    {!! Form::close() !!}
                </span>
                <span class="file-wrapper2">
                    {!! Form::button('Selecionar todas', array('class'=>'btn btn-default', 'id'=>'btn_selall')) !!}
                    {!! Form::button('Excluir selecionadas', array('class'=>'btn btn-danger', 'id'=>'btn_excluisel', 'disabled'=>'disabled')) !!}
                </span>

        </div>
        @if( ! empty($imagens))
             <p class="qtde_imgs">{{sizeof($imagens)}} Imagen(s)</p>
        @else
            <p class="qtde_imgs">Nenhuma imagem no album!</p>
        @endif

            <div id="qtde_selecionadas"></div>


        <div class="row">
            @if( ! empty($imagens))
                <?php $i=1;
                       $check_rdo =false;
                ?>
                 @foreach($imagens as $imagem)
                        <?php
                        if ($imagem == $infos_album->capa){
                            $check_rdo = true;
                            $display = "block";
                            $funcao_hide = "";
                        }else{
                            $check_rdo = false;
                            $display = "none";
                            $funcao_hide = "onmouseleave=\"hide_menu_capa('rdo$i');\"";
                        }?>

                        <div class="col-md-2 img-thumbnail" style="padding: 8px; margin: 10px">
                            <div class="img_edit" onmouseover="show_menu_capa('rdo{{$i}}');" {!! $funcao_hide !!} >
                                <center><p class="lbl_capa_album" id="rdo{{$i}}" style="display: {{$display}};">{!! Form::radio('capa_album', $imagem , $check_rdo, ['class'=>'rdo_capa_album']) !!} Capa do álbum</p></center>

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



@endsection