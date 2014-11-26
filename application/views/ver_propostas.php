<script type="text/javascript" src="<?php echo base_url()?>resources/js/my_functions.js"></script>
<script>
  $(document).ready(function(){

/* =========================================================== PROPOSSTAS=====================================================*/
  $("[name=proposta_aprovacao]").on("click" , function(){
    //$(this).parent('td').parent('tr').hide();
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
      $.ajax({
                type: "POST",
                url: "ver_propostas/atualizar_aprovado/"+id+"/1"
              })
                .success(function( msg ) {
                  var n = noty({text: "Proposta aprovada.", type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
                      killer: true
                  });
                    $(el).parent('td').parent('tr').hide();
                });
  });

  $('[name=proposta_recusar]').on('click', function(){
    $(this).parent('td').parent('tr').hide();
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
      $.ajax({
                type: "POST",
                url: "ver_propostas/deletar/"+id
              })
                .success(function( msg ) {
                  var n = noty({text: "Proposta recusada.", type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
                      killer: true
                  });
                    $(el).parent('td').parent('tr').hide();
                });

    });

/* =========================================================================*/
  });

</script>
<h2>Lista de Propostas</h2>
<p class="bs-callout bs-callout-info">
	Abaixo você pode ver a lista das propostas que foram feitas a você.
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  Você não tem nenhuma <code>proposta</code> <strong>;(</strong>
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
          <th>Proposta</th>
          <th>Encomenda</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      {propostas}
        <tr>
             
          <td style="display:none" value="{id_pro}" id="table_id"></td>
          <td>{nome_ent}</td>
          <td>R$ {vr_pro}</td>
          <td>{descricao_enc}</td>
          <td>
           <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Aprovar">  <span class="glyphicon glyphicon-ok"></span> </a>

            <a href="#" name="proposta_recusar" id="proposta_recusar" data-original-title="Recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        {/propostas}
        <!--<tr>
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="success">
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="info">
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr>
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="warning">
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr>
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        <tr class="danger">
          <td>Lucas Henrique</td>
          <td>R$ 17,50</td>
          <td>Encomenda X</td>
          <td>
           <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"></span> </a>
            <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr> -->
      </tbody>
    </table>
  
  
<?php
	echo form_close();
?>