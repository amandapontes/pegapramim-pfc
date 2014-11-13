<h2>Lista de Avaliações</h2>
<p class="bs-callout bs-callout-info">
	Aqui é possível avaliar os usuários que você finalizou um entrega com o mesmo.
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form"');
	   echo form_hidden('id_opc','{id_pro}');
?>
<table class="table table-responsive">
      <thead>
        <tr>    
          <th>Foto</th>
          <th>Usuário</th>
          <th>Avaliação</th>
        </tr>
      </thead>
      <tbody>
        <tr class="active">
          <td><a data-toggle="dropdown" href="#"> 
      <img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
       +
      </a></td>
          <td>Lucas Henrique</td>
          <td>
            <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-star-empty"></span> </a>
          </td>

        </tr>

        <tr>
          <td>#</td>
          <td>Lucas Henrique</td>
          <td>
            <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-star-empty"></span> </a>
          </td>

        </tr>
<tr>
          <td>#</td>
          <td>Lucas Henrique</td>
          <td>
            <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-star-empty"></span> </a>
          </td>

        </tr>

<tr>
          <td>#</td>
          <td>Lucas Henrique</td>
          <td>
            <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-star-empty"></span> </a>
          </td>

        </tr>

<tr>
          <td>#</td>
          <td>Lucas Henrique</td>
          <td>
            <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-star-empty"></span> </a>
          </td>

        </tr>


      </tbody>
    </table>
  
  
<?php
	echo form_close();
?>