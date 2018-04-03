<!DOCTYPE html>
<html lang="en">

<head>

<style>

#upload_fotos{
	margin-bottom: 800px;
}

</style>

    
    
<!-- upload img -->
<script type="text/javascript" src="{!! asset('layout/jupload/js_upload/jquery-1.6.2.min.js') !!}"></script>
<link href="{!! asset('layout/jupload/css_upload/ui-lightness/jquery-ui-1.8.14.custom.css') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('layout/jupload/css_upload/fileUploader.css') !!}" rel="stylesheet" type="text/css" />
<script src="{!! asset('layout/jupload/js_upload/jquery-ui-1.8.14.custom.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('layout/jupload/js_upload/jquery.fileUploader.js') !!}" type="text/javascript"></script>
<!-- fim upload -->


</head>

<body>       
 
 	
 
     <div id="upload_fotos" >
         
               
                
                <form action="{!! asset('adm/enviafotos/') !!}/{{$id_album}}" method="post" enctype="multipart/form-data" >
                    <input type="file" name="userfile" class="fileUpload" multiple>
                    
                    <button id="px-submit" type="submit">Enviar</button>
                    <button id="px-clear" type="reset">Limpar</button>
                </form>
          

                <script type="text/javascript">
					jQuery(function($){
                        $('.fileUpload').fileUploader();
                    });  
                </script> 
     
            
    </div>
    
    .
    
    
</body>



