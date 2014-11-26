function removeTodos(n){
		
	}
	
	function feedback(msg){
		var obj = jQuery.parseJSON(msg);
		if(obj.cod == '-1' || obj.cod == '0' ){
        	var n = noty({text: obj.msg, type: 'error', shadow: false, styling: "bootstrap" , hide: true, delay: 500,
			killer: true

        				});
        	removeTodos(n);
        	return 0;
      	}
      	else if(obj.cod == '1'){
      		var n = noty({text: obj.msg, type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
      	killer: true
		});
  			removeTodos(n);
  			return obj.cod;
      	}
      	return obj.cod;
}
$(document).ready(function(){
	$('a').tooltip();
	$('[data-original-title]').tooltip();
	$('.popover-dismiss').popover({
	  trigger: 'click'
	});
	$('.cel').mask('(99) 9999-99999?');
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

/*====================================================================== LGON E DADOS ENTIDADE
*/
//$('#login').hide();
		$('#cadastrar').hide();
		$('a#openLogin').click(function(){
			$('#login').show(600);
			$('#cadastrar').hide(500);
		});
		$('a#openCadastro').click(function(){
			$('#cadastrar').show(600);
			$('#login').hide(500);
		});

/*
		$("#login").validate({
			submitHandler: function(form){
			var formulario = $('form#login');
			var dados = formulario.serialize();
			 $.ajax({
		          type: "POST",
		          url: "acesso/cadastrar",
		          data: dados
		        })
		          .success(function( msg ) {
		        	var n = noty({text: msg, type: 'error'});
		        	removeTodos(n);
		          });
				return false;
			}
		});
*/
	
		$('input[name="login_ent"]').keypress(function(){
			//$(this).parent('#group-email');
			//console.log($(this).parent('#group-email'));
			
			var elemento = $(this).parents('.form-group');
			
			$(elemento).removeClass('has-error');
		});

		$('#login_senha').keypress(function(){
			var elemento = $(this).parent('#group_login_senha');
			if($('#login_senha').val().length >= 5){
				$(elemento).removeClass('has-error');
				
			}
		});

$('#cadastro_senha').keypress(function(){
			
			//console.log($(this).parent('#group-email'));
			
			var elemento = $(this).parent('#group_cadastrar_senha');
			if($('#cadastro_senha').val().length >= 5){
				$(elemento).removeClass('has-error');
			}
		});

		$('#login').submit(function(event){

		    event.preventDefault;
			var formulario = $('form#login');
			var dados = formulario.serialize();
			if($('#login_senha').val().length < 6){
				var n = noty({text: 'Senha deve conter no mínimo 6 caracteres.', type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
				removeTodos(n);
				$('#group_login_senha').addClass('has-error');
			        $('#login_senha').focus(function(){
			        	 $(this).select();
			        	});
			}
			else {
	        $.ajax({
	          type: "POST",
	           url: "index.php/login_controller/custom_form",
	          data: dados
	        })
	          .success(function( msg ) {
	          	if(feedback(msg)){
					setInterval(function(){
		          		document.location = 'index.php/inicio';
						},3000);
	          	}
          		//var n = noty({text: msg, type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
	          });
	          event.preventDefault;
			}
        	  return false;
			});

		
/* *=========================================================================/




//or for specific element
/* progressJs().set(80);
progressJs("#centro").start();
*/

});