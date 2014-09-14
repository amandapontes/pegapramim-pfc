<h2>Opções</h2>
<p class="bs-callout bs-callout-info">
	Preencha abaixo o <strong>valor(R$)</strong> de cada Quilometro(KM) para facilitar o cálculo da sua proposta.
</p>
<?php
	echo form_open('opcoes/custom_form','name="formOpcoes" class="form-horizontal" role="form"');
	echo form_hidden('id_opc','{id_opc}');
#	echo form_label('VR por KM');
	#echo form_input('vr_por_km','{vr_por_km}');

	#echo form_submit('enviar','Salvar','class="btn btn-default"');
?>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Valor por KM</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Valor por KM" name="vr_por_km" value="{vr_por_km}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <button type="submit" class="btn btn-default">Salvar</button>
    </div>
  </div>
<?php
	echo form_close();
?>