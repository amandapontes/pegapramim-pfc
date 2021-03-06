<script>
	$(document).ready(function(){
	
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

		$('#cadastrar').submit(function(event){
					var formulario = $('form#cadastrar');
					var dados = formulario.serialize();
					if($('#cadastro_senha').val().length < 6){
						var n = noty({text: 'Senha deve conter no mínimo 6 caracteres.', type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
						
						$('#group_cadastrar_senha').addClass('has-error');
					        $('#cadastro_senha').focus(function(){
					        	 $(this).select();
					        	});
					}
					else{
						if($('#cadastro_senha_rp').val() != $('#cadastro_senha').val()){
							var n = noty({text: 'Senhas não coincidem.', type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
						}
						else{
					        $.ajax({
					          type: "POST",
					          url: "<?php echo base_url();?>index.php/cadastros/entidades/custom_form",
					          data: dados
					        })
					          .success(function( msg ) {
					          	if(feedback(msg)){
								setInterval(function(){
					          		document.location = "<?php echo base_url();?>index.php/inicio";
										},3000);
					          	}
								$('#group-email').addClass('has-error');
						        $('#group-email > input[name="login_ent"]').focus(function(){
						        	 $(this).select();
						        	});
					          });
							  event.preventDefault;
						}
					}
				        	  return false;
						});

	});

</script>
 <hgroup class="bs-callout bs-callout-info">
	<h4> Cadastrar </h4>
	<h5>Para se cadastrar em nosso site e ter acesso aos nossos recursos<span id="complemento_cadastro">, <a href="#" id="openCadastro">clique aqui</a></span></h5> 

		<form class="form-horizontal" role="form" id="cadastrar" method="POST">
			<?php
				//echo form_hidden('ativo','1');
				echo form_hidden('hide_ativo','{hide_ativo}');
				echo form_hidden('tipo','{tipo}');
				echo form_hidden('id_ent','{id_ent}');
				echo form_hidden('tela_login','0',"id='tela_login'");
			?>
			<div class="form-group" id="ativo_div">
				<div class="input-group">
					<div class="checkbox">
					    <label>
					      <input type="checkbox" name="ativo" checked="{ativo}"> Ativo
					    </label>
		  	</div>
		  		</div>
		  			</div>
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon">
				  	<span class="glyphicon glyphicon-user"></span>
				  </span>
				  <input type="text" class="form-control" placeholder="Nome" name="nome_ent" value="{nome_ent}" required>
				</div>
			</div>

			<div class="form-group" id="group-email">
				<div class="input-group">
				  <span class="input-group-addon">
				  	<img src="<?php echo base_url();?>resources/img/email.png" width="14px" height="14px" />
				  </span>
				  <input type="email" class="form-control" placeholder="Email" name="login_ent" value="{login_ent}" required readonly="{readonly_email}" />
				</div>
			</div>

			<div class="form-group">
				<div class="input-group"  id="group_cadastrar_senha">
				  <span class="input-group-addon">
				  	<img src="<?php echo base_url();?>resources/img/lock.png" width="14px" height="14px" />
				  </span>
				  <input type="password" class="form-control" placeholder="Senha" name="senha_ent"  id="cadastro_senha" minlength="6" required>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group" id="group_cadastrar_senharp">
				  <span class="input-group-addon">
				  	<img src="<?php echo base_url();?>resources/img/lock.png" width="14px" height="14px" />
				  </span>
				  <input type="password" class="form-control" placeholder="Confirmar senha" name="senha_ent_conf" id="cadastro_senha_rp" minlength="6" required>
				</div>
			</div>
			<div class="form-group">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
		    </div>
		</form>
</hgroup>

<script>
	$(document).ready(function(){
		if('{novo_adm}' == 1){
			$('[name=tela_login]').val(1);
			$('[name=id_ent]').val('');
			$('[name=login_ent]').attr('readonly', false);
		}
		if($('[name=hide_ativo]').val() != ''){
			$('#ativo_div').hide();
		} 
		else{
			$('#ativo_div').show();
		}
		if('{ativo}' == '1'){
			$('[name=ativo]').attr('checked', true);
		}
		else{
			$('[name=ativo]').removeAttr('checked');
		}
	});
</script>