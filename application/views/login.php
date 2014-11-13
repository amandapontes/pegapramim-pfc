<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
	<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
	<meta name="author" content="Codrops" />
	<title>Bem Vindo - PegaPraMim</title>
	<?php
		$this->load->view('includes/css');
		$this->load->view('includes/js');
	?>
	<script>jQuery(document).ready(function($) {
		alert()
	});</script>
</head>

<body>
<section class="em-linha">
	<section id="login">
	
	<h1>ENTRAR</h1>
		<?php
			echo form_open_multipart('login_controller/custom_form','name="form" class="form-horizontal" role="form"');
			echo form_fieldset(' ');
		?>
	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">CPF/CNPJ</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="CPF ou CNPJ" name="cpf_cnpj_ent" />
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="inputPassword3" placeholder="Senha" name="senha_ent" />
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Entrar</button> ou  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>  Entrar com rede social</button> 
	    </div>
	  </div>
			<!-- echo form_label('CPF/CNPJ');
			echo form_input('cpf_cnpj_ent');
			
			
			echo form_label('Senha');
			echo form_password('senha_ent');
			
			
			echo form_submit('submit','Entrar','class="btn btn-default"'); -->
	<?php
			echo form_fieldset_close();
			echo form_close();
?>
	</section>
	<section id="cadastro">
	<h1>CADASTRAR</h1>
		<?php
		 $this->load->view('cadastros/entidades');
		?>
</section>
</body>
</html>