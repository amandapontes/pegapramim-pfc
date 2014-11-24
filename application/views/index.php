<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<title>Bem Vindo - PegaPraMim</title>
		
   <?php
		$this->load->view('includes/css');
		$this->load->view('includes/js');
   ?>

</head>
<body>
<?php $this->load->view('includes/header');?>

<header>
<div id="opcoes_sistema">
	<nav id="cbp-spmenu-s3" class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top cbp-spmenu-open">					
		<a href="#" id="inicio" class="link_ativo">
					<span class="glyphicon glyphicon-home"> Inicio</span>
				
				</a>
		
				<a href="#">
				<?php
 					echo form_hidden('url','solicitar_motoboy');
				?>
					<span class="glyphicon glyphicon-globe"> Soliciar Ajuda</span>
					
				</a>
		
				<a href="#">
				<?php
 					echo form_hidden('url','ver_propostas');
				?>
					<span class="glyphicon glyphicon-usd"> Propostas</span>
					
				</a>
				<a href="#">
				<?php
 					echo form_hidden('url','ver_negociacoes');
				?>
					<span class="glyphicon glyphicon-user"> Negociações</span>
					
				</a>
				<a href="#">
				<?php
 					echo form_hidden('url','lista_negociacao');
				?>
					<span class="glyphicon glyphicon-user"> Remover Negociações</span>
					
				</a>
				<a href="#">
				<?php
 					echo form_hidden('url','ver_avaliacoes');
				?>
					<span class="glyphicon glyphicon-user"> Avaliações</span>
					
				</a>
				<a href="#" id="opcoes">
				<?php
 					echo form_hidden('url','opcoes');
				?>
					<span class="glyphicon glyphicon-cog"> Configurações</span>
					
				</a>
				<a href="site/landing_page">
					<span class="glyphicon glyphicon-user"> Conheça</span>
					
				</a>
				<a href="#" id="cadastro_entidade">
				<?php

 					echo form_hidden('url','cadastros/entidades/load_user');
				?>
					<span class="glyphicon glyphicon-user"> <?php echo $this->session->userdata('nome_ent'); ?></span>
					
				</a>
			
				<a href="login_controller/deslogar"> 
					<span class="glyphicon glyphicon-user"> Sair</span>
					
				</a>
			
	</nav>
</div>
</header>
<div id="camposEscondidos">
	<input type="hidden" name="latitude_cli_entra" id="latitude_cli_entra" />
	<input type="hidden" name="longitude_cli_entra" id="longitude_cli_entra" />
	<?php 
	//	<input type="hidden" name="usa_sessao" id="longitude_cli_entra" />
?>
</div>
<section id="centro">

<section id="sessao-json">
	<?php
		$this->load->view('localizacao_atual');
	?>
	<section id="troca">
		
	</section>

</section>