<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bem Vindo - PegaPraMim</title>

	<?php
		$this->load->view('includes/css');
		$this->load->view('includes/js');
	?>
</head>

<body>
	<?php $this->load->view('includes/header');?>
	<hgroup class="bs-callout bs-callout-info">
	<h4> Entrar </h4>
	<h5>Caso já possua cadastro em nosso site<span id="complemento_frase">, <a href="#" id="openLogin">clique aqui</a> para entrar.</span></h5>
 

		<form class="form-horizontal" role="form" id="login" method="POST">
			<div class="form-group" id="group-email-login">
				<div class="input-group">
				  <span class="input-group-addon">
					  <img src="<?php echo base_url();?>resources/img/email.png" width="14px" height="14px" />
				  </span>
				  <input type="email" class="form-control" placeholder="Email" name="login_ent" required>
				</div>
			</div>

			<div class="form-group">
				<div class="input-group" id="group_login_senha">
				  <span class="input-group-addon">
				  	<img src="<?php echo base_url();?>resources/img/lock.png" width="14px" height="14px" />
				  </span>
				  <input type="password" class="form-control" placeholder="Senha" name="senha_ent" id="login_senha" required minlength="6" >
				</div>
			</div>
			<div class="form-group">
		      <button type="submit" class="btn btn-default" id="btnEntrar">Entrar</button>
		    </div>
		</form>
	</hgroup>
<?php
	$this->load->view('cadastros/entidades');
?>
<hgroup class="bs-callout bs-callout-warning">
	<h4> Conheça </h4>
	<h5>Não sabe como funciona nossa solução? <a href="index.php/site/landing_page" >Clique aqui</a> e veja o seu funcionamento.</h5>
</hgroup>

</body>
</html>
<?php
	#require_once('includes/footer.php');
?>

<script>
	$(document).ready(function(){
		$('[name=tela_login]').val(1);
		$('[name=tipo]').val('C');
		$('[name=id_ent]').val('');
		$('[name=login_ent]').attr('readonly', false);
	});
</script>