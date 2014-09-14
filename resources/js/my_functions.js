$(document).ready(function(){
	$('#menu a').click(function(){
		if($(this).attr('id') == 'inicio'){
			location.reload();	
		}
		else if($(this).attr('id') == 'opcoes'){
			$('#localizacao_atual').hide(700);
		}
		else{
			$('#localizacao_atual').show(700);
		}
		var valor = $(this).find('input[name="url"]').val();
		if(valor != 'undefined'){
			$('#sessao-json > #troca').load(valor);
			if(valor=='solicitar_motoboy'){
				$('#esconde').hide();
			}
			else{
				$('#mapa').hide();
			}
		}
	});

	$('#esconde').click(function(){
		lat = $('input[name="hd_latitude_atual"]').val();
		log = $('input[name="hd_longitude_atual"]').val();
		if( lat =! '' && log =! ''){
			$('#latitude_cli_entra').val(lat);
			$('#longitude_cli_entra').val(log);

        $.ajax({
          type: "GET",
          url: "login_controller/atualizarLocalizacao",
          data: { latitude: lat, longitude: log }
        })
          .done(function( msg ) {
          //  alert( "Data Saved: " + msg );
          location.reload();
          });
		}
	});

	 $('input[name="btnEnviar"]').click(function(){
            console.log($('form[name="formSolicitar"] > input[name="latitude_cli"]').val());
            $('form[name="formSolicitar"] > input[name="latitude_cli"]').val($('input[name="latitude_cli_entra"]').val());
            $('form[name="formSolicitar"] > input[name="longitude_cli"]').val($('input[name="longitude_cli_entra"]').val());
            
        });
		$('input:button').click(function(){
	        	if($(this).attr('id') == 'enviarProposta'){
				var formulario = $(this).parent('form');
				var dados = formulario.serialize();
		        $.ajax({
		          type: "POST",
		          url: "encomenda_controller/enviar_proposta",
		          data: dados
		          //data: { latitude: position.coords.latitude, longitude: position.coords.longitude }
		        })
		          .done(function( msg ) {
		          	$(formulario).hide();
		          //  alert( "Data Saved: " + msg );
		         // alert(position.coords.latitude);
		           //  location.reload(); 
		          });

			}
		});


//or for specific element
/* progressJs().set(80);
progressJs("#centro").start();
*/

});