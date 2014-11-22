<h2>Opções</h2>
<p class="bs-callout bs-callout-info">
	Preencha abaixo o <strong>valor(R$)</strong> de cada Quilometro(KM) para facilitar o cálculo da sua proposta.
</p>
<?php
	echo form_open('opcoes/custom_form','name="formOpcoes" class="form-horizontal" role="form"');
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
	Filtre os resultados das solicitações de Ajuda, inserindo a <strong>distância MÁXIMA</strong> entre você e o endereço de entrega proposto.
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