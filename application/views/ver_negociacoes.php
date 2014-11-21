<script type="text/javascript" src="<?php echo base_url()?>resources/js/my_functions.js"></script>
<h2>Lista de Negociações</h2>
<p class="bs-callout bs-callout-info">
	Abaixo você pode ver a lista das negociações que foram feitas por você.
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  Você não tem nenhuma negociação <strong>;(</strong>
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form" style="{nenhum_resultado_tabela}"');
	   echo form_hidden('id_opc','{id_pro}');
?>
<table class="table table-responsive table-striped">
      <thead>
        <tr>    
          <th style="display:none">id</th>
          <th>Usuário</th>
          <th>Encomenda</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        {propostas}
        <tr class="{status_color}">
             
          <td style="display:none" value="{id_pro}" id="table_id"></td>
          <td>{nome_ent}</td>
          <td>{descricao_enc}</td>
          <td>{status}</td>
          <td>
          <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Aprovar">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" name="proposta_recusar" id="proposta_recusar" data-original-title="Recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
           <a href="#" name="negociacao_visualizacao" id="negociacao_visualizacao" data-original-title="Visualizar">  <span class="glyphicon glyphicon-eye-open"></span> </a>
          </td>

        </tr>
        {/propostas}
      </tbody>
    </table>
  
  
<?php
	echo form_close();
?>