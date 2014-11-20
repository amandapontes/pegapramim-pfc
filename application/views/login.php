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
<section class="em-linha">
	<section id="login">
	
	<h1>ENTRAR</h1>
		<?php
			echo form_open_multipart('login_controller/custom_form','name="form" class="form-horizontal" role="form"');
			echo form_fieldset(' ');
		?>
	

	  <div class="form-group">
	  	<div class="col-sm-11">
			<div class="input-group">
	 			 <span class="input-group-addon">Email&nbsp;</span>
	  			 <input type="text" class="form-control" placeholder="Digite seu e-mail" name="login_ent" required/>
			</div>
		</div>
		</div>


	  <div class="form-group">
		    <div class="col-sm-11">
				<div class="input-group">
		 			 <span class="input-group-addon">Senha</span>
		  			 <input type="password" class="form-control" placeholder="Senha" name="senha_ent" required/>
				</div>
			</div>
		</div>

	  <div class="form-group">
	    <div class="col-sm-11">
	      <button type="submit" class="btn btn-default" id="btn_login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrar</button>
	    </div>
	  </div>
		

		
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