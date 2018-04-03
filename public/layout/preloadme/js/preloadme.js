    //<![CDATA[
        $(window).on('load', function() { // makes sure the whole site is loaded 
            $('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
	    $('.inner_logo').delay(550).append( "<a class='navbar-brand page-scroll animated zoomInUp' href='./' style='font-size: 3.5em;'>BETO AMBROSIO</a>" );
		$('.nav').delay(400).css("display","block");
		

		$('#slider_header').css("background-color", "black");
		$('#slider_header').css("margin-top", "50px");
		
		//alert($( window ).width());
		//alert($( document ).height());
		if ($( window ).width()>992){
			$('.li_img_capa').css("height", $( window ).height()-99);
			$('#slider_header').css("height", $( window ).height()-99);
			$('#slider_header').css("margin-top", "100px");
			//$('#slider_header').css("background", "linear-gradient(141deg, #000 0%, #513E00 51%, #000 95%)");
			//background:url(imagens/layout/footer.png) repeat top;
			//$('#slider_header').css("border-top", "1px solid #fff");
			$('.intro-text').css("position", "absolute");
			$('.intro-text').css("top", $( window ).height()/2 + "px");
			$('.intro-text').css("left", ($( window ).width()/2)-130 + "px");
			$('.navbar-default').css("background-color", "black");
			$('#btn-catarse').css("font-size","35px");
			
		}else{
			$('.intro-text').css("position", "relative");
			$('.intro-text').css("top", "-9em");
			$('#slider_header').css("padding-top", "150px");
			$('#slider_header').css("height", $( window ).height());
		}
			
			$('.intro-lead-in').css("display","none");
			setTimeout(function(){ $('.intro-lead-in').css("display","block"); $('.intro-lead-in').addClass('animated jackInTheBox'); }, 1000);
			

			
        })
    //]]>
