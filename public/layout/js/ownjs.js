//este arquivo é chamado diretamente nas views que o utilizam..



$(document).ready(function() {

	
	

    $('.fancybox').fancybox();
    
   
    
	$("#iframe").fancybox({
        type: 'iframe',
        padding: 0,

        afterClose    :   function() {
            $.loader({
                className:"Jloader",
                content:''
            });
            parent.location.reload();
        }
	});
	

	
		$("#iframe_palestras").fancybox({
			type: 'iframe',
			padding: 0
		});

	

    
    //selecionar tds imagens
     $( "#btn_selall" ).click(function() {
         //alert('a');
         var todos_desmarcados=true;
         var cont_selecionadas = 0;
        $('input[type=checkbox]').each(function () {
                $(this).prop('checked', !this.checked);
                if (this.checked) {
                    $('#btn_excluisel').prop('disabled', false);
                    todos_desmarcados = false;
                    cont_selecionadas++;
                }
        });
         if(todos_desmarcados){
             $('#btn_excluisel').prop('disabled', true);
             // alert('disable button')
         }
         $("#qtde_selecionadas").html("<p>" + cont_selecionadas + " imagen(s) selecionada(s) </p>")
    });

    //excluir imagens
    $( "#btn_excluisel" ).click(function() {
        var resp = confirm("Excluir imagem(ns) ?");
        if (resp) {
            $.loader({
                className:"Jloader",
                content:''
            });
            var response = "";
            $('input[type=checkbox]').each(function () {
                if (this.checked) {
             //       alert("/adm/delete_img/" + $(this).val());
                   $.ajax({
                        type: "GET",
                        url: "/adm/delete_img/" + $(this).val(),
                        async: false
                    }).done(function(data) {
                    //   response= data;

                   //     alert(data);
                    	

                    	if (data=="erro"){
                    		alert('erro ao apagar!');
                    	}
                       
                       
                   });
                   
                }
            });
$.loader('close');
	 
 location.reload(true);
        }
    });
	
	    //excluir imagens palestras
    $( "#btn_excluisel_pal" ).click(function() {
        var resp = confirm("Excluir imagem(ns) ?");
        if (resp) {
            $.loader({
                className:"Jloader",
                content:''
            });
            var response = "";
            $('input[type=checkbox]').each(function () {
                if (this.checked) {
					var url_thumb;
					var url;
					var url_thumb_aux;
					url_thumb_aux = $(this).val().split("/");
					url_thumb = url_thumb_aux[0] + '/1/thumbs/' + url_thumb_aux[2];
				//	url = url_thumb_aux[0] + '/1/' + url_thumb_aux[2];
           //       alert("/adm/delete_img/" + $(this).val());
		   //	    alert("/adm/delete_img/" + url_thumb);
		   //		alert("/adm/delete_img/" + url);
				
                    $.ajax({
                        type: "GET",
                        url: "/adm/delete_img/" + url_thumb,
                        async: false
                    }).done(function(data) {
                    //   response= data;

                   //     alert(data);
                    	

                    	if (data=="erro"){
                    		alert('erro ao apagar!');
                    	}

                    }); 

             

					
                }
            });
$.loader('close');
	 
location.reload(true);
        }
    });
    
    //excluir imagens
    $( "#btn_excluisel_capa" ).click(function() {
        var resp = confirm("Excluir imagem(ns) ?");
        if (resp) {
            $.loader({
                className:"Jloader",
                content:''
            });
            var response = "";
            $('input[type=checkbox]').each(function () {
                if (this.checked) {
                    //alert("/adm/delete_img/" + $(this).val());
                   $.ajax({
                        type: "GET",
                        url: "/adm/delete_imgs_capa/" + $(this).val(),
                        async: false
                    }).done(function(data) {
                       response= data;

                      // alert(data);
                   });

                }
            });
            $.loader('close');
            location.reload(true);
        }
    });



        //funcao executada ao marcar/desmarcar checkbox -> abilita/desabilita botao de excluir imgs e conta qts estão selecionadas.
        $('.chkimgselect').click(function(){
            var todos_desmarcados=true;
            var cont_selecionadas = 0;
            $('input[type=checkbox]').each(function () {
                if (this.checked) {
                    $('#btn_excluisel').prop('disabled', false);
                    todos_desmarcados = false;
                    cont_selecionadas++;
                }
            });
            if(todos_desmarcados){
                $('#btn_excluisel').prop('disabled', true);
               // alert('disable button')
            }
           $("#qtde_selecionadas").html("<p>" + cont_selecionadas + " imagen(s) selecionada(s) </p>")
        });


    $("#btn_add_fotos_editAlbum").change(function() {
       $.loader({
           className:"Jloader",
           content:''
      });
       
       $('#Frm_add_fotos_editAlbum').submit();
    });
    
    

    $("#btn_altera_capa").change(function() {
        $.loader({
            className:"Jloader",
            content:''
        });
        $('#Frm_altera_capa').submit();
    });
    
	
	
	$("#btn_altera_capa_categoria").change(function() {
        $.loader({
            className:"Jloader",
            content:''
        });
        $('#Frm_altera_capa_categoria').submit();
    });
    
    
    
    $("#btn_altera_img_palestra").change(function() {
        $.loader({
            className:"Jloader",
            content:''
        });
        $('#Frm_altera_img_palestra').submit();
    });
    
    
    

    $(".rdo_capa_album").change(function () {
        $.loader({
            className:"Jloader",
            content:''
        });

        	
       // alert ("/adm/define_capa_album/" + $(this).val()); 
        
        $.ajax({
            type: "GET",
            url: "/adm/define_capa_album/" + $(this).val(),
            async: false
        }).done(function(data) {
            response= data;
            // alert(data);
        });

        $.loader('close');
        location.reload(true);
    });

    $('.lbl_selecionar').click(function(){
     /*   $.loader({
            className:"Jloader",
            content:''
        });
        */
        //seila viajei
    });

    /*editable fields*/

    $.fn.editable.defaults.mode = 'inline';

    $('.editable_field').editable({
    	escape: true
    });

  
    $('.palestra_dt_editable').editable({
            
            combodate: {
                minYear: 2016,
                maxYear: 2022,
                minuteStep: 5
           }
    });

    /*----------------------------------------------------------------------------------------*/

    $("#btn_voltar_upload_albuns").click(function(){
        window.location.replace("/adm/criar_album");
    });
    
   




});

function deleta_album(id){
   if(confirm('Tem certeza que quer deletar o album? \n Isto removerá todas as fotos do mesmo!'))
    {
        $.loader({
            className:"Jloader",
            content:''
        });

        $.ajax({
            type: "GET",
            url: "/adm/delete_album/" + id,
            async: false
        }).done(function(data) {
            response= data;
             alert('deletado!');
        });
        $.loader('close');
        location.reload(true);
    }
    
    
}


function show_lapis(id_album){
    document.getElementById('lapis_edit'+id_album).style.visibility = "visible";
}

function hide_lapis(id_album){
    document.getElementById('lapis_edit'+id_album).style.visibility = "hidden";
}

function show_menu_capa(rdo){
    document.getElementById(rdo).style.display = "block";
}

function hide_menu_capa(rdo){
  
    document.getElementById(rdo).style.display = "none";
}











