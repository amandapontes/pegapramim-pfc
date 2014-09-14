<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style.css" />
	<title>Bem Vindo - FlyMoto</title>

	<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.min.js"></script>
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<!--
		<script type="text/javascript" src="<?php echo base_url()?>resources/js/location.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>resources/js/demo_progress.js"></script>
	-->
	<script type="text/javascript" src="<?php echo base_url()?>resources/js/location_atual.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>resources/js/mapa.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>resources/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>resources/js/progress.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.noty.packaged.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>resources/js/my_functions.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_enviar').click(function(){
			if($('.email').val() != ''){

			var dados = $('form').serialize();
		$.ajax({
		          type: "POST",
		          url: "landing_page/save_news",
		          data: dados
		          //data: { latitude: position.coords.latitude, longitude: position.coords.longitude }
		        })
		          .done(function( msg ) {
					var n = noty({text: 'Obrigado, email cadastrado com sucesso.',  type: 'success'});
					$('.email').val('');
		          });

			}
			else{
				$('.email').focus();
			}
		});

	});

</script>

</head>
<body>
	<header>
	<a href="#">
	<section id="logo">
		<img src="<?php echo base_url(); ?>resources/img/site/logo.png" />
	</section>
	</a>
	<nav id="menu">
		<a href="#oque">O que é</a>
		<a href="#como">Como funciona</a>
		<!-- <a href="#regulamento">Regulamento</a> -->
		<a href="#cadastro">Cadastre-se</a>
	</nav>
	</header>
	<section id="banner">
		<img src="<?php echo base_url(); ?>resources/img/site/banner.png" class="full_width"/>
	</section>
		
		<h1 class="titulo">
		<a name="oque">O que é</a>
		</h1>

		<section class="left-text-content">
		<p>
			Fly Moto é uma plataforme para solicitação e integração
			entre motoboys e empresas ou pessoas físicas que
			queiram contratar um serviço de motofrete.
			Nossa plataforma pode der instalada em smartphones
			com Android ou iOS de forma rápida, fácil e gratuita.
		</p>
		</section>	
			<article class="rigth-icon-content">
				<img src="<?php echo base_url(); ?>resources/img/site/question.png" style="max-height:250px !important; max-width:250px;"/>
			</article>

		<h1 class="titulo">
		<a name="como">Como funciona</a>
		</h1>

		<section class="left-text-content">
			<ol>
			<li>
				<div class="circle"><span class="centro">1</span></div>
				<span>Informe os locais de retirada e entrega da mercadoria</span>
			</li>
			<li>
				<div class="circle"><span class="centro">2</span></div>
				<span>Receba os orçamentos</span>
			</li>
			
			<li>
				<div class="circle"><span class="centro">3</span></div>
				<span>Escolha o que melhor lhe atender. Veja as avaliações, fotos, distância entre outras informações</span>
			</li>
			<li>
				
				<div class="circle"><span class="centro">4</span></div>
				<span>Aguarde a confirmação por parte do motoboy</span>
			</li>
			<li>
				<div class="circle"><span class="centro">5</span></div>
				<span>Tudo ok, acompanhe a chegada do motoboy em tempo real pelo mapa. Entregue a mercadoria e pague o serviço</span>
			</li>
			<li>
				<div class="circle"><span class="centro">6</span></div>
				<span>Acompanhe o trajeto no mapa até a entrega</span>
			</li>
			<li>
				<div class="circle"><span class="centro">7</span></div>
				<span>Receba a confirmação da entrega</span>
			</li>
			
			</ol>
		</section>	
			<article class="rigth-icon-content">
				<img src="<?php echo base_url(); ?>resources/img/site/setting.png"  id="trigger" style="max-height:250px !important; max-width:250px;"/>

			</article>

		<h1 class="titulo">
		<a name="cadastro">Cadastre-se</a>
		</h1>

		<section class="left-text-content" style="width:98% !important; float:none !important">
		<p class="centro-text">
			Para saber mais sobre o <span class="color-logo">flyMoto</span> <u>cadastre-se e receba descontos especiais</u> e novidades por e-mail.
			<br />
			<i>OBS: VÁLIDO PARA APENAS OS <strong>100</strong> PRIMEIROS</i>
		</p>
		<?php 
				echo form_open('site/landing_page/save_news');
			
			?>
			<section>
				
				<input type='email' placeholder="Digite seu email ... " class="email" name="email" required="required" />
			<?php
				echo "<br />";
				echo form_button('btn_enviar','Enviar','id="btn_enviar"');
				
			?>
			</section>
			<?php
				echo form_close();
			?>
		</section>	

	<footer>
		<p>
			Todos os direitos reservados FlyMoto 2014
		</p>
		<section id="social">
			<a href="">
				<img src="<?php echo base_url(); ?>resources/img/site/facebook.png"  id="trigger" style="max-height:250px !important; max-width:250px;"/>
			</a>
			<a href="">
				<img src="<?php echo base_url(); ?>resources/img/site/twitter.png"  id="trigger" style="max-height:250px !important; max-width:250px;"/>
			</a>
			<a href="">
				<img src="<?php echo base_url(); ?>resources/img/site/youtube.png"  id="trigger" style="max-height:250px !important; max-width:250px;"/>
			</a>
		</section>
</body>
</html>