<h2>Lista de Negociações</h2>
<p class="bs-callout bs-callout-info">
	Abaixo você pode ver a lista das negociações que foram feitas por você.
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form"');
	   echo form_hidden('id_opc','{id_pro}');
?>
<table class="table table-responsive">
      <thead>
        <tr>    
          <th>Usuário</th>
          <th>Encomenda</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr class="active">
          <td>Lucas Henrique</td><td>Encomenda X</td>
          <td>Em aberto</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr>
       <td>Lucas Henrique</td><td>Encomenda X</td>
          <td>Em aberto</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="success">
          <td>Lucas Henrique</td><td>Encomenda X</td>
          <td>Finalizado</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <td>Lucas Henrique</td><td>Encomenda X</td>
          <td>Finalizado</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
      
        <tr class="danger">
                    <td>Lucas Henrique</td><td>Encomenda X</td>
          <td>Cancelado</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
      </tbody>
    </table>
  
  
<?php
	echo form_close();
?>