
<h2>Lista de Negociações</h2>
<p class="bs-callout bs-callout-info">
	Abaixo você pode ver a lista das negociações de ajuda das <code>suas</code> encomendas.
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  Você não tem nenhuma <code>negociação</code> <strong>;(</strong>
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="form-horizontal" role="form"');
	   echo form_hidden('id_opc','{id_pro}');
?>
<div style="{nenhum_resultado_tabela}">   
    <table class="bs-callout bs-callout-warning table table-responsive table-striped" >
          <thead>
            <tr>    
              <th style="display:none">id</th>
              <th style="display:none">status_sigla</th>
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
              <td style="display:none" value="{status_pro}" class="status_sigla"></td>
              <td>{nome_ent}</td>
              <td>{descricao_enc}</td>
              <td>{status}</td>
              <td class="acoes">
               <a href="#" name="negociacao_visualizacao" id="negociacao_visualizacao" data-original-title="Visualizar" data-toggle="modal" data-target="" data-whatever="{id_pro}">  <span class="glyphicon glyphicon-eye-open"></span> </a>
               <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Finalizar" style="display:{possui_acoes};">  <span class="glyphicon glyphicon-ok"></span> </a>
               <a href="#" name="proposta_recusar" id="proposta_recusar" data-original-title="Cancelar" style="display:{possui_acoes};">  <span class="glyphicon glyphicon-remove"></span> </a>
              </td>

            </tr>
            {/propostas}
          </tbody>
        </table>
</div>
<p class="bs-callout bs-callout-info">
  Abaixo você pode ver a lista das negociações das propostas que <code>você</code> fez.
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado_feito}">
  Você não tem nenhuma <code>negociação</code> <strong>;(</strong>
</p>
<div style="{nenhum_resultado_tabela_feito}">
  <table class="bs-callout bs-callout-warning table table-responsive table-striped">
        <thead>
          <tr>    
            <th style="display:none">id</th>
            <th style="display:none">status_sigla</th>
            <th>Usuário</th>
            <th>Encomenda</th>
            <th>Status</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          {propostas_feito}
          <tr class="{status_color}">
            <td style="display:none" value="{id_pro}" id="table_id"></td>
            <td style="display:none" value="{status_pro}" class="status_sigla"></td>
            <td>{nome_ent}</td>
            <td>{descricao_enc}</td>
            <td>{status}</td>
            <td class="acoes">
             <a href="#" name="negociacao_visualizacao" id="negociacao_visualizacao" data-original-title="Visualizar" data-toggle="modal" data-target="" data-whatever="{id_pro}">  <span class="glyphicon glyphicon-eye-open"></span> </a>
             <a href="#" name="proposta_recusar" id="proposta_recusar" data-original-title="Cancelar" style="display:{possui_acoes};">  <span class="glyphicon glyphicon-remove"></span> </a>
            </td>
          </tr>
          {/propostas_feito}
        </tbody>
      </table>
</div>


  <?php
  echo form_close();
?>
  <section id="sessao-json_conversa">
  <section id="troca">
 
  </section>

</section>


<script type="text/javascript" src="<?php echo base_url()?>resources/js/my_functions.js"></script>
<script>
  $(document).ready(function(){
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
    $('#formMensagem').submit(function(event){

        event.preventDefault;
        var formulario = $('form#formMensagem');
        var dados = formulario.serialize();

          $.ajax({
            type: "POST",
             url: "ver_negociacoes/add_mensagem_negociao",
            data: dados
          })
            .success(function( msg ) {
              feedback(msg);
              //var n = noty({text: msg, type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
            });
            event.preventDefault;

            return false;
      }); 
    

 $("[name=proposta_aprovacao]").on("click" , function(){
    //$(this).parent('td').parent('tr').hide();
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
      $.ajax({
                type: "POST",
                url: "ver_propostas/atualizar_status/"+id+"/F"
              })
                .success(function( msg ) {
                  var n = noty({text: "Negociação Finalizada, acesse o menu de avaliações e avalie sua ajudante.", type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
                      killer: true
                  });
                   $('#sessao-json > #troca').load('ver_negociacoes');
                });
  });

  $('[name=proposta_recusar]').on('click', function(){
    $(this).parent('td').parent('tr').hide();
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
      $.ajax({
                type: "POST",
                url: "ver_propostas/atualizar_status/"+id+"/C"
              })
                .success(function( msg ) {
                  var n = noty({text: "Negociação Cancelada.", type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
                      killer: true
                  });
                   $('#sessao-json > #troca').load('ver_negociacoes');
                });

    });

  $('[name=negociacao_visualizacao]').on('click', function(){
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
        $('#sessao-json_conversa > #troca').load('ver_negociacoes/load_conversa/'+id);        
    });

  });
</script>

