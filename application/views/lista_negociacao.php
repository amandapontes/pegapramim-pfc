<h2>Histórico da Proposta</h2>
<p class="bs-callout bs-callout-info">
	Agora é possível conversar com seu ajudante e acertar os detalhes.
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formEncomenda" class="bs-callout bs-callout-warning form-horizontal" role="form"');
	   echo form_hidden('id_opc','{id_pro}');
?>
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
       <div class="col-sm-10 comentar_div">
      <textarea class="form-control" id="inputEmail3" placeholder="Sua mensagem" name=""></textarea>
    
    </div>
    <nav class="comentar_div">
    	  <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-envelope"> Enviar</span> </a>
        <a href="#" id="proposta_aprovacao">  <span class="glyphicon glyphicon-ok"> Aprovar</span> </a>
        <a href="#" id="proposta_recusar">  <span class="glyphicon glyphicon-remove"> Recusar</span> </a>
  	
    </nav>
    
    </ul>
  
  
<?php
	echo form_close();
?>