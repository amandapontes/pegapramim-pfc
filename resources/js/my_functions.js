$(document).ready(function(){
	if($('#notification_encomenda').is(":visible")){
		$('#sessao-json').attr("style","width: 60%");
	}
	else{
		$('#sessao-json').attr("style","width: 98%");	
	}
	
	$('#opcoes_sistema a').click(function(){
		$('#opcoes_sistema a').each(function(){
			$(this).removeClass('link_ativo');
		});
		$(this).addClass('link_ativo');
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
				$('#descricao_enc').focus();
				$('#esconde').hide();
			}
			else{
				$('#mapa').hide();
			}
		}
	});

	$('#esconde').click(function(){
		/*
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
		 */
	});

	 $('input[name="btnEnviar"]').click(function(){
            console.log($('form[name="formSolicitar"] > input[name="latitude_cli"]').val());
            $('form[name="formSolicitar"] > input[name="latitude_cli"]').val($('input[name="latitude_cli_entra"]').val());
            $('form[name="formSolicitar"] > input[name="longitude_cli"]').val($('input[name="longitude_cli_entra"]').val());
            
        });
		$('[name="enviarProposta"]').on("click", function(){
				
				var formulario = $(this).parents('form');
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
		});

		$('#proposta_aprovacao').on('click', function(){
			
				$('#sessao-json > #troca').load('index.php/ver_propostas');
		});

		$('#proposta_recusar').click(function(){
			
				$(this).parent('td').parent('tr').hide();
		});

		$('.glyphicon-ok').on("click", function(){
			
		});
		
		/**
		 * Evento de click para logar
		 */

		$('#btn_login').click(function(evt){
				evt.preventDefault();
				var formulario = $(this).parents('form');
				var dados = formulario.serialize();

		        $.ajax({
		          type: "POST",
		          url: "login_controller/custom_form",
		          data: dados
		        })
		          .done(function( msg ) {
		          	if(msg != 1){
		          		alert("Usuário não existe");
		          		return false;
		          	}
		          	else{
		          		alert('Seja Bem Vindo !');
		          		 location.reload(); 
		          	}
		          	
		          });
		});

	/**
		 * Evento de click para SALVAR OU CADASTRAR uma entidade
		 */

		$('#btn_salvar_entidade').click(function(evt){
				evt.preventDefault();
				var formulario = $(this).parents('form');
				var dados = formulario.serialize();

		        $.ajax({
		          type: "POST",
		          url: "cadastros/entidades/custom_form",
		          data: dados
		        })
		          .done(function( msg ) {
		          	if(msg != 1){
		          		alert("Usuário não existe");
		          		return false;
		          	}
		          	else{
		          		alert('Seja Bem Vindo !');
		          		 location.reload(); 
		          	}
		          	
		          });
		});
//or for specific element
/* progressJs().set(80);
progressJs("#centro").start();
*/

});