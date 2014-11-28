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
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  Nenhuma <code>mensagem</code> foi trocada entre vocês.
</p>
  <div class="bs-callout bs-callout-warning" style="{nenhum_resultado_tabela}">
    <ul class="media-list">
            {msg}
          <li class="media">
            <a class="pull-left" href="#">
              <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
            </a>
            <div class="media-body">
              <h4 class="media-heading">{nome_ent}</h4>
              <p>{msg_lista_nego}</p>
            </div>
          </li>
            {/msg}
        </ul>
      </div>
 
        <section class="bs-callout" style="{readonly_msg}">
        <h5>Nova Mensagem</h5>
              <div class="form-group">
                  <div class="col-sm-12">
                  <div class="input-group">
                     <span class="input-group-addon">Mensagem</span>
                       <textarea class="form-control" id="conteudo_mensagem" placeholder="Digite sua mensagem" name="msg_lista_nego" class="form-control" required ></textarea>
                  </div>
                </div>
              </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary enviar_mensagem" style="{readonly_msg}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"> Enviar</span></button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>

    </div>
  </div>
</div>
 <?php
        echo form_close();
  ?>
  <!-- fim tela de NEGOCICACOES-->

  <script>
  $(document).ready(function(){
     $('#conversaModal').modal('show');  

  });
  </script>