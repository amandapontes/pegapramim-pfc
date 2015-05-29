<script type="text/javascript" src="<?php echo base_url()?>resources/js/my_functions.js"></script>
<script>
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
  $(document).ready(function(){
    $('.proposta_aprovacao > span').click(function(){
      if($(this).hasClass('glyphicon-star')){
        $(this).addClass('glyphicon-star-empty');   
      }
      else{
        $(this).removeClass('glyphicon-star-empty');
        $(this).addClass('glyphicon-star');   
      }
      var pai = $(this).parents('td');
      var qtd_estrelas = $(pai).children('a').children('span.glyphicon-star').length;
      if(qtd_estrelas >0){
        pai.next('td').children('a').show();
      }
      else{
        pai.next('td').children('a').hide();
      }
      
    });
$("[name=proposta_aprovacao]").on("click" , function(){
    //$(this).parent('td').parent('tr').hide();
    var id = $(this).parents('td').parents('tr').find('#table_id').attr('value');
    var el = this;
    var estrelas = $(this).parents('td').parents('tr').find('#qtd_estrelas');
    var qtd_estrelas = $(estrelas).children('a').children('span.glyphicon-star').length;
    var descricao = $(this).parents('td').parents('tr').find('#descricao_ava').val();
      $.ajax({
                type: "POST",
                url: "ver_avaliacoes/enviar_avialiacao/"+id+"/"+qtd_estrelas,
                data: {descricao_ava: descricao}
              })
                .success(function( msg ) {
                  if(feedback(msg)){
                    $(el).parent('td').parent('tr').hide();
                  }
                });
      });

  });
</script>

<h2>Lista de Avaliações</h2>
<p class="bs-callout bs-callout-info">
  Avalie o usuário que realizou <code>sua entrega</code>
</p>
<p class="bs-callout bs-callout-danger" style="{nenhum_resultado}">
  Você não tem nenhum usuário para <code>avaliar</code> <strong>=D</strong>
</p>
    <?php 
     echo form_open('encomenda_controller/enviar_proposta','name="formAvaliacoes" class="bs-callout bs-callout-warning form-horizontal" role="form" style="{nenhum_resultado_tabela}"');
     echo form_hidden('id_opc','{id_pro}');
?>
<table class="table table-responsive">
      <thead>
        <tr>    
          <th style="display:none">id_pro</th>
          <th>Foto</th>
          <th>Usuário</th>
          <th>Encomenda</th>
          <th>Avaliação</th>
          <th>Comentário</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      {avaliacoes}
        <tr class="active">
        <td style="display:none" value="{id_pro}" id="table_id"></td>
          <td>
          <a data-toggle="dropdown" href="#"> 
      <img src="<?php echo base_url()?>resources/img/avatar.jpg" class="img-circle" />
      </a>
      </td>
          <td>{nome_ent}</td>
          <td>{descricao_enc}</td>
          <td>
                  <div class="form-group">
                      <div class="col-sm-12">
                      <div class="input-group">
                           <textarea class="form-control" id="descricao_ava" placeholder="Digite a avaliação" name="descricao_ava" class="form-control">{descricao_ava}</textarea>
                      </div>
                    </div>
                  </div>
                   <div class="col-sm-offset-1">
        </div>
          </td>
          <td id="qtd_estrelas">
            <a class="proposta_aprovacao"><span data-original-title="Marque para dar estrela para o usuário, ou desmarque para remover." class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span data-original-title="Marque para dar estrela para o usuário, ou desmarque para remover." class="glyphicon glyphicon-star-empty"></span></a>
            <a class="proposta_aprovacao"><span data-original-title="Marque para dar estrela para o usuário, ou desmarque para remover." class="glyphicon glyphicon-star-empty"></span></a>
          </td>

          <td>
             <a href="#" name="proposta_aprovacao" id="proposta_aprovacao" data-original-title="Enviar Avaliação" style="display:none;">  <span class="glyphicon glyphicon-ok"></span> </a>           
          
          </td>
              </tr>
      {/avaliacoes}

      </tbody>
    </table>
  
  
<?php
  echo form_close();
?>