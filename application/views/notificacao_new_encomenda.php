<script type="text/javascript">
	$(document).ready(function(){

		//var tempo = window.setInterval(carrega, 10000);
		var valor_txt;
		function carrega(){
			if($('input[name="vr_proposta"]') != 'undefined'){
				$('input[name="vr_proposta"]').each(function(){
					if($(this).val() != '0.00' && $(this).val() != '0,00'){
						return false;
					}
					else {
						$('#new_encomenda').load("encomenda_controller");
					}
				});

			}
		}
$.getJSON("http://maps.google.com/maps/api/geocode/json?address="+position.coords.latitude +","+position.coords.longitude+"&sensor=false",function(result){
                 $("#str-endereco").html("Seu endereço é: " +result.results[0].formatted_address);
            });
	
	});
</script>
<section id="notification_encomenda">
		
	<section id="new_encomenda">
		{encomendas}
		<?php 
			echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form"');
			echo form_hidden('id_enc','{id_enc}');
			echo form_hidden('id_ent','{id_ent}');
			echo form_hidden('longitude_cli','{longitude_cli}');
            echo form_hidden('latitude_cli','{latitude_cli}');
            echo form_hidden('longitude_enco','{longitude_enco}');
            echo form_hidden('latitude_enco','{latitude_enco}');
            echo form_hidden('id_ent_motoboy','{id_logado}');
		?>
		<h2>
			Nova Encomenda 
		</h2>

		 <div class="dropdown">
			<a data-toggle="dropdown" href="#"> 
			<img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
			{nome_ent} +
			</a>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				<detais>
					<p>
						Telefone: {descricao_cont}
					</p>
					<p>
						CPF/CNPJ: {cpf_cnpj_ent}
					</p>
				</detais>
		  </ul>
		</div>
			<p><strong>Destino:</strong></p> {formatted_address}
				<div class="row">
					  <div class="col-md-4"><strong>Distância:</strong> {distancia}</div>
					  <div class="col-md-offset-2"><strong>Duração:</strong> {duracao}</div>
				</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Proposta: </label>
			</div>	
			<div class="form-group">
			   <div class="input-group">
				  <span class="input-group-addon">R$</span>
				  <input type="text" class="form-control text-right" placeholder="Valor" name="vr_proposta" value="{vr_medio}" />
				</div>
			</div>
			<?php
				#echo form_input('vr_proposta','{vr_medio}');
				//echo form_submit('enviar','Enviar Proposta');
			?>
			<div class="form-group">
			    <div class="col-sm-offset-1">
				<button type="button" name="enviarProposta" id="enviarProposta" class="btn btn-default" >
					<span class="glyphicon glyphicon-usd"></span> Enviar Proposta
				</button>
				</div>
			</div>
		</p>
		<?php
			echo form_close();
		?>
		{/encomendas}
	</section>
</section>