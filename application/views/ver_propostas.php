<h2>Lista de Propostas</h2>
<p class="bs-callout bs-callout-info">
	Abaixo você pode ver a lista das propostas que foram feitas a você.
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form"');
	   echo form_hidden('id_opc','{id_pro}');
?>
<table class="table table-responsive">
      <thead>
        <tr>
        
          <th>Usuário</th>
          <th>Proposta</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr class="active">
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr>
                   <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="success">
                    <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="info">
                    <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr>
                    <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="warning">
                    <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr>
                    <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="danger">
                    <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
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