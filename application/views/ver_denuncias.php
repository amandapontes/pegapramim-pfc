<script type="text/javascript" src="<?php echo base_url()?>resources/js/my_functions.js"></script>
<script>
  $(document).ready(function(){
function removeTodos(n){
    
  }
  
function feedback(msg){
    var obj = jQuery.parseJSON(msg);
    if(obj.cod == '-1' || obj.cod == '0' ){
          var n = noty({text: obj.msg, type: 'error', shadow: false, styling: "bootstrap" , hide: true, delay: 500,
      killer: true

                });
          removeTodos(n);
          return 0;
        }
        else if(obj.cod == '1'){
          var n = noty({text: obj.msg, type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
        killer: true
    });
        removeTodos(n);
        return obj.cod;
        }
        return obj.cod;
}
/* =========================================================== PROPOSSTAS=====================================================*/

  $('[name=encomenda_recusar_denuncia]').on('click', function(){
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
      $.ajax({
                type: "POST",
                 url: "encomenda_controller/denunciar_item/"+id+"/N/",
              })
                .success(function( msg ) {
                    if(feedback(msg)){
                      $(el).parent('td').parent('tr').hide();
                    }
                });
    });

    $('[name=encomenda_aprovar_denuncia]').on('click', function(){
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
      $.ajax({
                type: "POST",
                 url: "encomenda_controller/denunciar_item/"+id+"/B/0",
              })
                .success(function( msg ) {
                    if(feedback(msg)){
                      $(el).parent('td').parent('tr').hide();
                    }
                });
    });

/* =========================================================================*/
  });

</script>
<h2>Lista de Itens {titulo_caso}</h2>
<p class="bs-callout bs-callout-info">
	{descricao_caso} <code>itens cadastrados</code>
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  {descricao_nenhum_resultado}
</p>
    <?php 
     echo form_open('encomenda_controller/deletar','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form" style="{nenhum_resultado_tabela}"');
	   echo form_hidden('id_opc','{id_enc}');
?>

<table class="table table-responsive table-striped">
      <thead>
        <tr>
        <th style="display:none">id</th>
          <th>Item</th>
          <th>Motivo da Denúncia</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      {encomendas}
        <tr>
             
          <td style="display:none" value="{id_enc}" id="table_id"></td>
          <td>{descricao_enc}</td>
          <td>{motivo_denuncia}</td>
          <td>
           <a href="#" name="encomenda_aprovar_denuncia" id="encomenda_aprovar_denuncia" data-original-title="Aprovar">  <span class="glyphicon glyphicon-ok"></span> </a>
           <a href="#" name="encomenda_recusar_denuncia" id="encomenda_recusar_denuncia" data-original-title="Recusar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        {/encomendas}
      </tbody>
    </table>
  
  
<?php
	echo form_close();
?>