


	
	$(document).ready(function() {
	    $('.fancybox').fancybox()
	});
	
	
	
	function hover_in_palestra(id){
		$( "#veja_mais" + id ).css("opacity","1");
		$( ".palestra_content").css("cursor","pointer");
	}
	
	
	function hover_out_palestra(id){
		$( "#veja_mais" + id ).css("opacity","0.4");
	}
	

	
	function ver_mais_palestra(url){
		$.fancybox.open({
		    padding : 0,
		    href: url,
		    type: 'iframe',
		    width: 1200
			
		});
	}