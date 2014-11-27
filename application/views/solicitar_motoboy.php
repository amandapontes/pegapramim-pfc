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

      $('#formSolicitar').submit(function(event){

        event.preventDefault;
      var formulario = $('form#formSolicitar');
      var dados = formulario.serialize();
 
          $.ajax({
            type: "POST",
             url: "solicitar_motoboy/custom_save",
            data: dados
          })
            .success(function( msg ) {
               var n = noty({text: "Necessidade salva com sucesso.", type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
        killer: true
    });
          setInterval(function(){
                  document.location = 'inicio';
            },3000);
              //var n = noty({text: msg, type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
            });
            event.preventDefault;

            return false;
      });

  });
</script>
<section id="solicitar_ajuda_content">
    <h2>Solicitar Ajuda</h2>
      <div class="bs-callout bs-callout-info">
        Aqui você pode solicitar aos usuários a ajuda para enviar sua encomenda.
    </div>
    <?php
                echo form_open('solicitar_motoboy/custom_save','name="formSolicitar" class="form-horizontal" id="formSolicitar"'); ?>
    <div id="endereco_origem">
                  <?php $this->parser->parse('input_endereco', array('label_input_endereco' => 'Endereço Origem '));  ?>
            </div>
            
            <div id="endereco_destino">
                <?php $this->parser->parse('input_endereco', array('label_input_endereco' => 'Endereço Destino'));  ?>
            </div>

           <!-- <div id="apresentacao"> -->
            <?php
                echo form_fieldset('');
                echo form_hidden('longitude_cli');
                echo form_hidden('latitude_cli');
                echo form_hidden('id_ent_motoboy','');
                echo form_hidden('id_ent','{id_logado}');
            ?>
    

        <div class="form-group">
            <div class="col-sm-11">
                <div class="input-group">
                     <span class="input-group-addon">Descrição</span>
                    <textarea class="form-control" id="descricao_enc" placeholder="Descrição da Ajuda" name="descricao_enc" class="form-control" id="inputPassword3" required></textarea>                            </div>

            </div>
        </div>

        <div class="form-group">
              <div class="col-sm-11">
                  <button type="submit" class="btn btn-default" id="btnEnviar">Enviar</button>
                </div>
            </div>
        <input type="hidden" id="txtLatitude" name="txtLatitude" />
        <input type="hidden" id="txtLongitude" name="txtLongitude" />
                  <?php

                echo form_fieldset_close();
                echo form_close();
            ?>
</section>
