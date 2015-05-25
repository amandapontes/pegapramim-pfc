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
/* =========================================================== ENTIDADES =====================================================*/

  $('[name=entidade_deletar]').on('click', function(){
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
      $.ajax({
                type: "POST",
                url: "cadastros/entidades/deletar/"+id
              })
                .success(function( msg ) {
                    if(feedback(msg)){
                      $(el).parent('td').parent('tr').hide();
                    }
                });
    });

   $('[name=entidade_editar]').on('click', function(){
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
     var valor = 'cadastros/entidades/load_user/'+id;
    if(valor != 'undefined'){
      $('#sessao-json > #troca').load(valor);
      if(valor=='solicitar_motoboy'){
        $('#descricao_enc').focus();
        $('#esconde').hide();
      }
      else{
        $('#mapa').hide();
      }
    }
    });

/* =========================================================================*/
  });

</script>
<h2>Lista de {tipo_listagem} cadastrados</h2>
<p class="bs-callout bs-callout-info">
	Listagem dos <code>{tipo_listagem} cadastrados</code>
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  Não há {tipo_listagem} cadastrados.
</p>
    <?php 
     echo form_open('cadastros/entidades/deletar','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form" style="{nenhum_resultado_tabela}"');
?>

<table class="table table-responsive table-striped">
      <thead>
        <tr>
        <th style="display:none">id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      {usuarios}
        <tr>
             
          <td style="display:none" value="{id_ent}" id="table_id"></td>
          <td>{nome_ent}</td>
          <td>{login_ent}</td>
          <td>
          <!-- <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Editar">  <span class="glyphicon glyphicon-edit"></span> </a> -->
            <a href="#" name="entidade_editar" id="entidade_editar" data-original-title="Editar">  <span class="glyphicon glyphicon-edit"></span> </a>
            <a href="#" name="entidade_deletar" id="entidade_deletar" data-original-title="Apagar">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        {/usuarios}
      </tbody>
    </table>
  
  
<?php
	echo form_close();
?>