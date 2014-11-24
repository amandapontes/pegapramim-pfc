<script>
  $(document).ready(function(){
    $('.proposta_aprovacao > span').click(function(){
      if($(this).hasClass('glyphicon-star')){
        $(this).addClass('glyphicon-star-empty');   
      }
      else{
        $(this).removeClass('glyphicon-star-empty');
        $(this).addClass('glyphicon-star');   
      }
      
    });
  });
</script>

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
          <th style="display:none">id</th>
          <th>Foto</th>
          <th>Usuário</th>
          <th>Avaliação</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr class="active">
        <td style="display:none" value="{id_pro}" id="table_id"></td>
          <td>
          <a data-toggle="dropdown" href="#"> 
      <img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
      </a>
      </td>
          <td>Lucas Henrique</td>
          <td>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>

          </td>

          <td>
             <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Enviar Avaliação">  <span class="glyphicon glyphicon-ok"></span> </a>           
          
          </td>
              </tr>

        <tr>
        <td style="display:none" value="{id_pro}" id="table_id"></td>
           <td>
          <a data-toggle="dropdown" href="#"> 
      <img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
      </a>
      </td>
          <td>Lucas Henrique</td>
          <td>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>

          </td>
          <td>
             <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Enviar Avaliação">  <span class="glyphicon glyphicon-ok"></span> </a>           
          
          </td>

        </tr>
<tr>
           <td>
          <a data-toggle="dropdown" href="#"> 
      <img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
      </a>
      </td>
          <td>Lucas Henrique</td>
          <td>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
 
          </td>
          <td>
             <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Enviar Avaliação">  <span class="glyphicon glyphicon-ok"></span> </a>           
          
          </td>

        </tr>

        <tr>
        <td style="display:none" value="{id_pro}" id="table_id"></td>
          <td>
          <a data-toggle="dropdown" href="#"> 
      <img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
      </a>
      </td>
          <td>Lucas Henrique</td>
          <td>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
 
          </td>
          <td>
             <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Enviar Avaliação">  <span class="glyphicon glyphicon-ok"></span> </a>           
          
          </td>

        </tr>

<tr>
<td style="display:none" value="{id_pro}" id="table_id"></td>
           <td>
          <a data-toggle="dropdown" href="#"> 
      <img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
      </a>
      </td>
          <td>Lucas Henrique</td>
          <td>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span class="glyphicon glyphicon-star-empty"></span></a>
 
          </td>
          <td>
             <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Enviar Avaliação">  <span class="glyphicon glyphicon-ok"></span> </a>           
          
          </td>

        </tr>


      </tbody>
    </table>
  
  
<?php
  echo form_close();
?>