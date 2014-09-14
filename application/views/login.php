<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Title pagina</title>
	<?php
		$this->load->view('includes/css');
		$this->load->view('includes/js');
	?>
</head>

<body>
<section class="em-linha">
	<section id="login">
	
	<h1>ENTRAR</h1>
		<?php
			echo form_open_multipart('login_controller/custom_form','name="form" class="form-horizontal" role="form"');
			echo form_fieldset('Login');
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
	      <button type="submit" class="btn btn-default">Entrar</button>
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
		<?php
		 $this->load->view('cadastros/entidades');
		?>
</section>
</body>
</html>