<script>
var geocoder;
var map;
var marker;
 
function initialize() {
    var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
    var options = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 	// var el = console.log($('#iframe_busca_map').contents().find('.my_custom_map').attr('id')); 
    map = new google.maps.Map(document.getElementById("iframe_busca_map"), options);

    geocoder = new google.maps.Geocoder();
 
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
    });
 
    marker.setPosition(latlng);
}
 function carregarNoMapa(endereco, formulario) {
        geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
 					$('#mapaModalLabel').html("Veja no Mapa - "+results[0].formatted_address);
                    $(formulario).children('#txtEndereco').val(results[0].formatted_address);
                    $(formulario).children('#txtLatitude').val(latitude);
                    $(formulario).children('#txtLongitude').val(longitude);
 
                    var location = new google.maps.LatLng(latitude, longitude);
                    marker.setPosition(location);
                    map.setCenter(location);
                    map.setZoom(16);
                }
            }
        });
    }
$(document).ready(function () {
    initialize();

      $(".btnEndereco").click(function() {
      	var formulario = $(this).parents('.form-horizontal');
        //if($(this).val().lenght > 3)
           // carregarNoMapa($(this).parent().prev(".txtEndereco").val(), formulario);
    });
 
    $(".txtEndereco").blur(function() {
	 	var formulario = $(this).parents('.form-horizontal');
       // if($(this).val().lenght > 3)
            //carregarNoMapa($(this).val(), formulario);
    });
    $(".txtEndereco_destino").autocomplete({
        source: function (request, response) {
            geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
                response($.map(results, function (item) {
                    return {
                        label: item.formatted_address,
                        value: item.formatted_address,
                        latitude: item.geometry.location.lat(),
                        longitude: item.geometry.location.lng()
                    }
                }));
            })
        },
        select: function (event, ui) {
        	var formulario = $(this).parents('.form-horizontal');
            $('#txtLatitude_destino').val(ui.item.latitude);
            $("#txtLongitude_destino").val(ui.item.longitude);
            var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
            marker.setPosition(location);
            map.setCenter(location);
            map.setZoom(16);
        }
    });

  $(".txtEndereco_origem").autocomplete({
        source: function (request, response) {
            geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
                response($.map(results, function (item) {
                    return {
                        label: item.formatted_address,
                        value: item.formatted_address,
                        latitude: item.geometry.location.lat(),
                        longitude: item.geometry.location.lng()
                    }
                }));
            })
        },
        select: function (event, ui) {
            $('#txtLatitude_origem').val(ui.item.latitude);
            $("#txtLongitude_origem").val(ui.item.longitude);
            var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
            marker.setPosition(location);
            map.setCenter(location);
            map.setZoom(16);
        }
    });

  $('#select_usuarios').change(function(event) {
  	 
      var formulario = $('form#Busca');
      var dados = formulario.serialize();
 		console.log(dados);
          $.ajax({
            type: "POST",
             url: "localizacoes/get_pontos_by_id",
            data: dados
          })
            .success(function( msg ) {
       			document.getElementById('iframe_busca_map').contentWindow.location.reload();
            });
            return false;
  });


});
</script>	
	<?php  echo form_open('localizacoes/get_pontos_by_id','name="formBusca" class="form-horizontal" id="Busca"'); ?>
		<section id="input_endereco_origem">
			<div class="form-horizontal" role="form" id="origem">
				<input type="hidden" id="txtLatitude_origem" name="latitude_cli" />
				<input type="hidden" id="txtLongitude_origem" name="longitude_cli" />
			   	 <article>
			        <fieldset>
						 <div class="campos">
							<h4>Usuários</h4>
							<div class="form-group">
							  	<div class="col-sm-11">
									<select class="form-control" name="id_ent" id="select_usuarios">
									<option value="0">Todos</option>					
									{usuarios}
									  <option value="{id_ent}">{nome_ent}</option>					
									{/usuarios}
									</select>
									
								</div>
							</div>

							<div class="form-group">
							  	<div class="col-sm-11">
									<div class="input-group">
							 			<span class="input-group-addon">Endereço</span>
							  			<input type="text" class="form-control txtEndereco_origem"  name="btnEndereco" required />
							  			
									</div>
								</div>

							</div>

						</div>
		                </fieldset>
		       	 
		       	 </article>	

			</div>
		    </section>
	    </form>
<!--
	    <section id="input_endereco_destino">
		<div class="form-horizontal" role="form" id="destino">
			<input type="hidden" id="txtLatitude_destino" name="latitude_enco" />
			<input type="hidden" id="txtLongitude_destino" name="longitude_enco" />
		   	 <article>
		        <fieldset>
					 <div class="campos">
						<div class="form-group">
						  	<div class="col-sm-11">
								<div class="input-group">
						 			<span class="input-group-addon">Endereço Destino</span>
						  			<input type="text" class="form-control txtEndereco_destino"  name="btnEndereco" required />
						  			<span class="input-group-btn">
							            	<button class="btn btn-default btnEndereco" type="button" data-toggle="modal" data-target="#mapaModal"><span class="glyphicon glyphicon-flag"></span> Mostrar no Mapa</button>
						          	</span>
								</div>
							</div>
						</div>
					</div>
	                </fieldset>
	       	 </article>	
		</div>
	    </section> -->
<div class="modal fade bs-example-modal-lg" id="mapaModal" tabindex="-1" role="dialog" aria-labelledby="mapaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="mapaModalLabel"></h4>
      </div>
      <div class="modal-body">
 		<div id="mapa" style="height: 900px; width: 100%;" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>

    </div>
  </div>
</div>
</div>
	     
<iframe src="<?php echo base_url()?>mpstst" id='iframe_busca_map' style="width: 100%; height: 520px; border: none; overflow-y: none;">
</iframe>