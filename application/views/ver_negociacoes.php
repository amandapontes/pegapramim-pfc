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


  });
</script>
<h2>Lista de Negociações</h2>
<p class="bs-callout bs-callout-info">
	Abaixo você pode ver a lista das negociações que foram feitas por você.
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  Você não tem nenhuma <code>negociação</code> <strong>;(</strong>
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form" style="{nenhum_resultado_tabela}"');
	   echo form_hidden('id_opc','{id_pro}');
?>
<table class="table table-responsive table-striped">
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
           <a href="#" name="negociacao_visualizacao" id="negociacao_visualizacao" data-original-title="Visualizar" data-toggle="modal" data-target="#conversaModal" data-whatever="{id_pro}">  <span class="glyphicon glyphicon-eye-open"></span> </a>
           <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Aprovar" style="display:{possui_acoes};">  <span class="glyphicon glyphicon-ok"></span> </a>
           <a href="#" name="proposta_recusar" id="proposta_recusar" data-original-title="Recusar" style="display:{possui_acoes};">  <span class="glyphicon glyphicon-remove"></span> </a>
          </td>

        </tr>
        {/propostas}
      </tbody>
    </table>
  <?php
  echo form_close();
?>
  <!-- INICIO TELA DE NEGOCICAÇÕES-->
         <?php 
           echo form_open('ver_negociacoes/add_mensagem_negociao','name="formMensagem" class="form-horizontal" role="form" id="formMensagem"');
           echo form_hidden('id_pro','{id_pro}');
           echo form_hidden('id_nego','{id_nego}');
        ?>   
<div class="modal fade bs-example-modal-lg" id="conversaModal" tabindex="-1" role="dialog" aria-labelledby="conversaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="conversaModalLabel">Histórico da Negociação</h4>
      </div>
      <div class="modal-body">
<p class="bs-callout bs-callout-info">
  Agora é possível conversar com seu ajudante e acertar os detalhes.
</p>
  <div class="bs-callout bs-callout-warning">
    <ul class="media-list">
          <li class="media">
            <a class="pull-left" href="#">
              <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
            </a>
            <div class="media-body">
              <h4 class="media-heading">eu</h4>
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
              <!-- Nested media object -->
            
              <!-- Nested media object -->
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Joao Carlos</h4>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
 
        <section class="bs-callout">
        <h5>Nova Mensagem</h5>
              <div class="form-group">
                  <div class="col-sm-12">
                  <div class="input-group">
                     <span class="input-group-addon">Mensagem</span>
                       <textarea class="form-control" id="conteudo_mensagem" placeholder="Digite sua mensagem" name="msg_lista_nego" class="form-control" required></textarea>
                  </div>
                </div>
              </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary enviar_mensagem"><span class="glyphicon glyphicon-envelope" aria-hidden="true"> Enviar</span></button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>

    </div>
  </div>
</div>
 <?php
        echo form_close();
  ?>
  <!-- fim tela de NEGOCICACOES-->
