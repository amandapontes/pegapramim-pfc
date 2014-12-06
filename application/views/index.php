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
	 					echo form_hidden('url','solicitar_motoboy/load_list');
					?>
					<span class="glyphicon glyphicon-headphones"> Ajudas Solicitadas</span>
					
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
					<span class="glyphicon glyphicon-transfer"> Negociações</span>
					
				</a>
				<!--
				<a href="#">
				<?php
 					echo form_hidden('url','lista_negociacao');
				?>
					<span class="glyphicon glyphicon-user"> Remover Negociações</span>
					
				</a>
				-->
				<a href="#">
				<?php
 					echo form_hidden('url','ver_avaliacoes');
				?>
					<span class="glyphicon glyphicon-star"> Avaliações</span>
					
				</a>
				<a href="#" id="opcoes">
				<?php
 					echo form_hidden('url','opcoes');
				?>
					<span class="glyphicon glyphicon-cog"> Configurações</span>
					
				</a>
				<a href="site/landing_page">
					<span class="glyphicon glyphicon-thumbs-up"> Conheça</span>
					
				</a>
				<a href="#" id="cadastro_entidade">
				<?php

 					echo form_hidden('url','cadastros/entidades/load_user');
				?>
					<span class="glyphicon glyphicon-user"> <?php echo $this->session->userdata('nome_ent'); ?></span>
					
				</a>
					<a href="#" id="acompanhamento">
				<?php

 					echo form_hidden('url','localizacoes');
				?>
					<span class="glyphicon glyphicon-map-marker"> Acompanhamento</span>
					
				</a>
				
					<a href="#" id="busca">
				<?php

 					echo form_hidden('url','localizacoes/busca');
				?>
					<span class="glyphicon glyphicon-search"> Busca</span>
					
				</a>

				<a href="login_controller/deslogar"> 
					<span class="glyphicon glyphicon-log-out"> Sair</span>
					
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
		<hgroup class="bs-callout bs-callout-warning">
			<h4> Conheça </h4>
			<h5>Não sabe como funciona nossa solução? <a href="site/landing_page" target="__blank" data-original-title="Não demora nem 1 minuto!!" >Clique aqui</a> e veja o seu funcionamento.</h5>
		</hgroup>
	</section>
</section>


