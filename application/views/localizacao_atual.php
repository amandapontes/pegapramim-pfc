<section id="localizacao_atual">
<h2>
	Localização atual
</h2>
	<?php
		echo form_hidden('hd_latitude_atual');
		echo form_hidden('hd_longitude_atual');
	?>
	<p class="bs-callout bs-callout-info"><span id="str-endereco"><span></p>
	<!-- <input type="button" name="btn_corrigir" value="Minha Localização" style="margin-top:5px; margin-bottom:9px;" /> -->
	<button type="button" name="btn_modificar" style="margin-top:5px; margin-bottom:9px;" id="esconde" class="btn btn-default" >
	    <span class="glyphicon glyphicon-refresh"></span> Corrigir Localização
	</button>
	    <article>
	        <fieldset>
                    <label for="txtEndereco">Endereço:</label>
                    <div class="campos">
                        <div class="col-lg-12">
					        <div class="input-group">
			        		  <input type="text" class="form-control" id='txtEndereco' name="btnEndereco">
				          		  	<span class="input-group-btn">
							            	<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-flag"></span> Mostrar no Mapa</button>
						          	</span>
					        </div><!-- /inpu			t-group -->
	      				</div>
                    </div>
                  <!--  <input type="hidden" id="txtLatitude" name="txtLatitude" />
                    <input type="hidden" id="txtLongitude" name="txtLongitude" />
			--> 
                </fieldset>
			<hr class ="linha" />
                  <div id="mapa" style="height: 500px; width: initial" >
		    <?php
			    //echo form_hidden('longitude_cli');
	            //echo form_hidden('latitude_cli');
            ?>
	    </article>
	 </section>
