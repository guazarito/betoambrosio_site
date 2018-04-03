<!DOCTYPE html>
<html lang="en">

<head>
		<script src="{!! asset('layout/js/jquery.js') !!}"></script>
		<link href="{!! asset('layout/css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/js/bootstrap.js') !!}"></script>
		    <link href="{!! asset('layout/css/jqueryLoader.css') !!}" rel="stylesheet">
    <script src="{!! asset('layout/js/jqueryLoader.js') !!}"></script>

    <script src="{!! asset('layout/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
    <script src="{!! asset('layout/fancyBox/source/jquery.fancybox.js?v=2.1.5') !!}"></script>
    <link href="{!! asset('layout/fancyBox/source/jquery.fancybox.css?v=2.1.5') !!}" rel="stylesheet">
		
        <script src="{!! asset('layout/js/ownjs.js') !!}"></script>

</head>

<body style="padding:50px;">


        <div id="adm_control">

                <span class="file-wrapper">                   
                    <a href="{{asset('adm/enviafotos_palestras/'.$id_palestra)}}" class="btn btn-success" id="iframe" >Adicionar fotos</a>
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

</body>

</html>
