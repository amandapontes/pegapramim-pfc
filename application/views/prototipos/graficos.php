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
		$this->load->view('includes/css_for_charts');
		$this->load->view('includes/js');
		$this->load->view('includes/js_for_charts');
   ?>

</head>
<body>
<?php $this->load->view('includes/header');?>

<header>
<div id="opcoes_sistema">
	<nav id="cbp-spmenu-s3" class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top cbp-spmenu-open">					
		<a href="#" id="inicio" class="link_ativo">
					<span class="glyphicon glyphicon-home"> Início</span>
				
				</a>
		
		<!-- MEUS ADM-->
				<?php  
					$tipo_ent = $this->session->userdata('tipo');
					if($tipo_ent == 'A'){
						// CLIENTES
						echo '<a href="#">';       
 						echo form_hidden('url','cadastros/entidades/listagem/C');
						echo '<span class="glyphicon glyphicon-globe">&nbsp;</span>Clientes</a>';	

						// ADMINISTRADORES
						// negociacoes
						echo '<a href="#">';       
 						echo form_hidden('url','cadastros/entidades/listagem/A');
						echo '<span class="glyphicon glyphicon-globe">&nbsp;</span>Administradores</a>';	
						
						// DENUNCIA
						echo '<a href="#">';       
 						echo form_hidden('url','solicitar_motoboy/load_list/D');
						echo '<span class="glyphicon glyphicon-globe">&nbsp;</span>Denúncias</a>';	
						
						// relatorios
					}
					else {					
					
					?>
					
		<!-- FIM ADM-->


				<a href="#">
				<?php
 					echo form_hidden('url','solicitar_motoboy');
				?>
					<span class="glyphicon glyphicon-globe">&nbsp;</span>Itens a enviar
					
				</a>
		


				<a href="#">
					<?php
	 					echo form_hidden('url','solicitar_motoboy/load_list');
					?>
					<span class="glyphicon glyphicon-tag">&nbsp;</span>Itens Cadastrados
					
				</a>

				<a href="#">
				<?php
 					echo form_hidden('url','ver_propostas');
				?>
					<span class="glyphicon glyphicon-usd">&nbsp;</span>Propostas
					
				</a>
				<a href="#">
				<?php
 					echo form_hidden('url','ver_negociacoes');
				?>
					<span class="glyphicon glyphicon-transfer">&nbsp;</span>Negociações
					
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
					<span class="glyphicon glyphicon-star">&nbsp;</span>Avaliações
					
				</a>
				<a href="#" id="opcoes">
				<?php
 					echo form_hidden('url','opcoes');
				?>
					<span class="glyphicon glyphicon-cog">&nbsp;</span>Configurações
					
				</a>
				
					<a href="#" id="acompanhamento">
				<?php

 					echo form_hidden('url','localizacoes');
				?>
					<span class="glyphicon glyphicon-map-marker">&nbsp;</span>Acompanhamento
					
				</a>
				
					<a href="#" id="busca">
				<?php

 					echo form_hidden('url','localizacoes/busca');
				?>
					<span class="glyphicon glyphicon-search">&nbsp;</span>Busca
					
				</a>
				<?php
				 } 
				?>
				<a href="#" id="cadastro_entidade">
				<?php
				if($tipo_ent == 'A'){
 					echo form_hidden('url','cadastros/entidades/load_user');
				}
				else{
					echo form_hidden('url','cadastros/entidades/load_user');
				}
				?>
					<span class="glyphicon glyphicon-user">&nbsp;</span><?php echo $this->session->userdata('nome_ent'); ?>
					
				</a>
				<a href="site/landing_page">
					<span class="glyphicon glyphicon-thumbs-up">&nbsp;</span>Conheça
					
				</a>
				<a href="login_controller/deslogar"> 
					<span class="glyphicon glyphicon-log-out">&nbsp;</span>Sair
					
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
		<hgroup class="bs-callout bs-callout-danger">
			<h4> Testes para tela de GRAFICOS </h4>
		</hgroup>
	<div class="input-group date">
  <input type="text" class="form-control datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div>

	<section class="bs-callout bs-callout-info">
		<div id="chart_div">
		</div>
		
		<div id="chart_div2">
		</div>
		<div id="chart_div3">
		</div>
	</section>

	</section>
</section>
