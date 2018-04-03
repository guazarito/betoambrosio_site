
function sendmail() {
			
		
	
             $.ajax({
                url: "http://www.marmitariapliniao.com.br/sendmail/digitalocean/betoambrosio/contact_me.php",
                type: "POST",
                data: {
                	'name': $('#name').val(),
                	'email': $('#email').val(),
                	'phone': $('#phone').val(),
                	'message': $('#message').val()
                },               
                
                success: function() {
                	
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Mensagem enviada!. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                	
                    // error message
                    $('#error').html("<div class='alert alert-danger'>");
                    $('#error > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#error > .alert-danger')
                        .append("<strong>Algo deu errado, tente novamente!. </strong>");
                    $('#error > .alert-danger')
                        .append('</div>');

                    //clear all fields
                  //  $('#contactForm').trigger("reset");
                }

             });
             
}


$('#name').focus(function() {
    $('#success').html('');
});
