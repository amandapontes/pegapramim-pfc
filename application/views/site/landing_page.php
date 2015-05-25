<!DOCTYPE HTML>
<html>
	<head>
		<title>Bem Vindo - PegaPraMimSite</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script type="text/javascript" src="<?php echo base_url()?>resources/js/site/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>resources/js/site/jquery.scrollzer.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>resources/js/site/jquery.scrolly.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>resources/js/site/skel.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>resources/js/site/skel-layers.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>resources/js/site/init.js"></script>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/site/skel.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/site/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/site/style-xlarge.css" />
	
		<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/site/ie/v8.css" /><![endif]-->
		<script>
			$(document).ready(function(){
				$('#news_letter').submit(function(event){
					event.preventDefault;
					var formulario = $(this);
					var dados = formulario.serialize();
			        $.ajax({
			          type: "POST",
			           url: "<?php echo base_url()?>index.php/site/landing_page/save_news",
			          data: dados
			        })
			          .success(function( msg ) {
			          	if(msg == 1){
							alert('Inscrição realizada com sucesso!');
							$('#email').val('');
			          	}
			          	else if(msg == "0"){
							alert('Você já esta inscrido!');
							$('#email').focus();
			          	}
		          		//var n = noty({text: msg, type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
			          });
			          event.preventDefault;

		        	  return false;
					});
			});
						</script>
						
	</head>
	<body>
		<div id="wrapper">

			<!-- Header -->
				<section id="header" class="skel-layers-fixed">
					<header>
						<span class="image avatar"><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>resources/img/logo_nuvem.png" /></a></span>
						<h1 id="logo"><a href="#">PegaPraMim</a></h1>
						<p>Sistema de compartilhamento de recursos<br />
						totalmente gratuito.</p>
					</header>
					<nav id="nav">
						<ul>
							<li><a href="#one" class="active">Sobre</a></li>
							<li><a href="#two">Como funciona</a></li>
							<li><a href="#three">Equipe</a></li>
							<li><a href="#four">Contato</a></li>
							<li><a href="<?php echo base_url()?>" class="destaque">Entrar no sistema</a></li>
						</ul>
					</nav>
					<footer>
						 <ul class="icons">
							<li><a href="mailto:pegapramimpfc@gmail.com" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul> 
					</footer>
				</section>

			<!-- Main -->
				<div id="main">

					<!-- One -->
						<section id="one">
							<div class="container">
								<header class="major">
									<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>resources/img/logo.png" /></a>
									<h2>Sobre</h2>
									<p>Precisando levar algo em algum lugar e está sem tempo para ir até lá?<br />
									Com o <a href="#">PEGAPRAMIM</a> falta de tempo não é empecilho.</p>
								</header>
								<p>
								Com o PegaPraMim, o cliente informará a origem e o destino de onde o item precisa ser levado, assim temos um rede de pessoas com necessidades em comum que podem se ajudar.
								</p>
								<h5>Porque Usar?</h5>
									<blockquote>
									É possível diminuir o custo com a entrega de um item, sendo uma forma de não depender do nosso serviço de entrega, que nem sempre possui todos os serviços a âmbito nacional, como também não ficamos dependentes da utilização de empresas de transporte que possuem um alto custo.
									</blockquote>
							</div>
						</section>
						
					<!-- Two -->
						<section id="two">
							<div class="container">
								<h2>Como Funciona</h2>
								<p>Veja como funciona em menos de 1 minuto.</p>
								<ul class="feature-icons">
									<li class="fa-wifi">Peça ajuda</li>
									<li class="fa-coffee">Acompanhe a entrega</li>
									<li class="fa-users">Receba propostas</li>
									<li class="fa-twitch">Avalie seu ajudante</li>
									<li class="fa-calculator">Negocie propostas</li>
									<li class="fa-smile-o">Fique satisfeito</li>
								</ul>
							</div>
						</section>
						
					<!-- Three -->
						<section id="three">
							<div class="container">
								<h2>Nossa equipe</h2>
								<p>Veja quem transforma ideias em ações, profissionais especializados em ajudar o cliente.</p>
								<div class="features">
									<article>
										<a href="#" class="image"><img src="<?php echo base_url()?>resources/img/site/nospfc.jpg" alt="" /></a>
										<div class="inner">
											<h4>Amanda Cristina & Lucas Henrique</h4>
											<p>
												<ul class="feature-icons">
													<li class="fa-code">PHP</li>
													<li class="fa-code">HTML</li>
													<li class="fa-code">CSS</li>
													<li class="fa-code">JQUERY</li>
													<li class="fa-code">AJAX</li>
													<li class="fa-code">SQL</li>
												</ul>
											</p>
										</div>
									</article>
								</div>
							</div>
						</section>
						
					<!-- Four -->
						<section id="four">
							<div class="container">
								<h2>Contato</h2>
								<p>Inscreva-se em nossa newsletter e fique por dentro das novidades.</p>
								<form method="post" id="news_letter">
									<div class="row uniform collapse-at-2">
										<div class="6u"><input type="email" name="email" id="email" placeholder="Digite seu email ..." required /></div>
									</div>							
									<div class="row uniform">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" class="special" value="Inscrever" id="news_letter_btn" /></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
						</section>
					
				</div>
			<!-- Footer -->
				<section id="footer">
					<div class="container">
						<ul class="copyright">
							<li>&copy; PegaPraMim todos os direitos reservados. 2015</li>
						</ul>
					</div>
				</section>
			
		</div>
	</body>
</html>