<?php
	echo form_open_multipart('cadastros/entidades/custom_form','name="form" class="form-horizontal" role="form"');
	echo form_fieldset(' ');

	echo form_hidden('ativo','1');
	echo form_hidden('login_ent','');
	echo form_hidden('tela_login','0');
?>
    
  <div class="form-group">
	  	<div class="col-sm-11">
			<div class="input-group">
	 			 <span class="input-group-addon">Nome</span>
	  			 <input type="text" class="form-control" placeholder="Digite seu nome" name="nome_ent" value="{nome_ent}" required/>
			</div>
		</div>
		</div>
  

	  <div class="form-group">
	  	<div class="col-sm-11">
			<div class="input-group">
	 			 <span class="input-group-addon">Email&nbsp;</span>
	  			 <input type="text" class="form-control" placeholder="Digite seu e-mail" name="login_ent" value="{login_ent}" required/>
			</div>
		</div>
		</div>


	  <div class="form-group">
		    <div class="col-sm-11">
				<div class="input-group">
		 			 <span class="input-group-addon">Senha</span>
		  			 <input type="password" class="form-control" placeholder="Senha" name="senha_ent" required/>
				</div>
			</div>
		</div>



	  <div class="form-group">
		    <div class="col-sm-11">
				<div class="input-group">
		 			 <span class="input-group-addon">Confirmar senha</span>
		  			 <input type="password" class="form-control" placeholder="Confirmar Senha" name="senha_ent_conf" required/>
				</div>
			</div>
		</div>



 	<div class="form-group">
	  	<div class="col-sm-11">
			<div class="input-group">
	 			 <span class="input-group-addon">Telefone</span>
	  			 <input type="text" class="form-control" placeholder="+xx (xx) xxxx-xxxxx" name="descricao_cont_tel" value="{descricao_cont_tel}" />
			</div>
		</div>
		</div>


 	<div class="form-group">
	  	<div class="col-sm-11">
			<div class="input-group">
	 			 <span class="input-group-addon">Celular&nbsp;&nbsp;&nbsp;</span>
	  			 <input type="text" class="form-control" placeholder="+xx (xx) xxxx-xxxxx" placeholder="Celular" name="descricao_cont_cel" value="{descricao_cont_cel}" />
			</div>
		</div>
		</div>

  </div>

	  <div class="form-group">
	    <div class="col-sm-11">
	      <button type="submit" class="btn btn-default" id="btn_salvar_entidade"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar</button>
	    </div>
	  </div>



<?php	

	echo form_fieldset_close();
	echo form_close();
?>
</section>