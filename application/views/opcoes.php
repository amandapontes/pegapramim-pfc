<script type="text/javascript" src="<?php echo base_url()?>resources/js/my_functions.js"></script>
<script>
  $(document).ready(function(){
  function removeTodos(n){
      
    }
  
function feedback(msg){
    var obj = jQuery.parseJSON(msg);
    if(obj.cod == '-1' || obj.cod == '0' ){
          var n = noty({text: obj.msg, type: 'error', shadow: false, styling: "bootstrap" , hide: true, delay: 500,
      killer: true

                });
          removeTodos(n);
          return 0;
        }
        else if(obj.cod == '1'){
          var n = noty({text: obj.msg, type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
        killer: true
    });
        removeTodos(n);
        return obj.cod;
        }
        return obj.cod;
}

      $('#form_opcoes').submit(function(event){

        event.preventDefault;
      var formulario = $('form#form_opcoes');
      var dados = formulario.serialize();
 
          $.ajax({
            type: "POST",
             url: "opcoes/custom_form",
            data: dados
          })
            .success(function( msg ) {
               var n = noty({text: "Opções salvas com sucesso.", type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
        killer: true
    });
          /*setInterval(function(){
                  document.location = 'inicio';
            },3000);*/
              //var n = noty({text: msg, type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
            });
            event.preventDefault;

            return false;
      });

  });
</script>
<h2>Opções</h2>
<p class="bs-callout bs-callout-info">
	Preencha abaixo o <strong>valor(R$)</strong> de cada <strong>Quilometro(KM)</strong> para facilitar o cálculo da sua proposta.
</p>
<?php
	echo form_open('opcoes/custom_form','name="formOpcoes" class="form-horizontal" role="form" id="form_opcoes"');
	echo form_hidden('id_opc','{id_opc}');

?>
    <div class="form-group" id="group-email-login">
    <div class="col-sm-11">
        <div class="input-group">
          <span class="input-group-addon">
            Valor por KM
          </span>
          <input type="text" class="form-control" placeholder="0.00" name="vr_por_km" value="{vr_por_km}">
        </div>
        </div>
      </div>
  
  
  <p class="bs-callout bs-callout-info">
	Filtre os resultados das solicitações de Ajuda, inserindo a <strong>distância MÁXIMA em Quilometro(KM)</strong> entre você e o endereço de entrega proposto.
</p>


  <div class="form-group" id="group-email-login">
    <div class="col-sm-11">
        <div class="input-group">
          <span class="input-group-addon">
            Limite de distância
          </span>
          <input type="text" class="form-control" placeholder="0" placeholder="Distância" name="distancia_limite" value="{distancia_limite}" />
        </div>
        </div>
      </div>
  
 
  
   <div class="form-group">
    <div class="col-sm-11">
      <button type="submit" class="btn btn-default">Salvar</button>
    </div>
  </div>
  
  
<?php
	echo form_close();
?>