<script>
    $(document).ready(function(){
        
});
</script>
<section id="solicitar_ajuda_content">
    <h2>Solicitar Ajuda</h2>
      <div class="bs-callout bs-callout-info">
        Aqui você pode solicitar aos usuários a ajuda para enviar sua encomenda.
    </div>
    <?php
                echo form_open('solicitar_motoboy/custom_save','name="formSolicitar"'); ?>
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
        <label for="inputPassword3" class="col-sm-2 control-label">Descrição</label>
        <div class="col-sm-10">
           <textarea class="form-control" id="descricao_enc" placeholder="Descrição da Ajuda" name="descricao_enc" class="form-control" id="inputPassword3" required></textarea>
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

                        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
        <br />
                    <?php
                                echo form_submit('btnEnviar','Enviar','class="btn btn-default"');
                            ?>   
        </div>
      </div>
                             

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
</section>
