<script>
    $(document).ready(function(){
        
});
</script>

<h2>Solicitar Ajuda</h2>

       <!-- <div id="apresentacao"> -->
        <?php
            echo form_open('solicitar_motoboy/custom_save','name="formSolicitar"');
            echo form_fieldset('');
            echo form_hidden('longitude_cli');
            echo form_hidden('latitude_cli');
            echo form_hidden('id_ent_motoboy','');
            echo form_hidden('id_ent','{id_logado}');
        ?>
        
        <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputEmail3" placeholder="Descrição da Ajuda" name="descricao_enc"></textarea>
    </div>
  </div>
               <!--
                <fieldset>

            
                    <div class="campos">
                        <label for="txtEndereco">Endereço:</label>
                        <?php
                            echo form_input('txtEndereco','',"id='txtEndereco'");
                        ?>
                        <input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
                    </div> -->
                        <?php
                            echo form_submit('btnEnviar','Enviar','class="btn btn-default"');
                        ?>    

                    <input type="hidden" id="txtLatitude" name="txtLatitude" />
                    <input type="hidden" id="txtLongitude" name="txtLongitude" />
<!--
                </fieldset>
            <div id="mapa" style="height: 500px; width: 700px">
-->
            <?php

            echo form_fieldset_close();
            echo form_close();
        ?>
   <!--         </div>
-->
