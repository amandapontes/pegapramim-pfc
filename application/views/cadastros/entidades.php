<section id="cadastro">
	<h1>CADASTRAR</h1>
<?php
	echo form_open_multipart('cadastros/entidades/custom_form','name="form" class="form-horizontal" role="form"');
	echo form_fieldset('Cadastrar');

	echo form_hidden('ativo','1');
	echo form_hidden('login_ent','');
    echo form_hidden('dt_nasc_ent','2014-02-05');	
	#echo form_radio('tipo_ent','M',TRUE).'Motoboy';
	#echo form_radio('tipo_ent','C').'Cliente';
?>
	<div class="radio">
  <label>
    <input type="radio" name="tipo_ent" id="optionsRadios1" value="M" checked>
    Motoboy
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="tipo_ent" id="optionsRadios2" value="C">
    Cliente
  </label>
</div>	

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nome Completo" name="nome_ent" />
    </div>
  </div>

<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">CPF/CNPJ</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="CPF ou CNPJ" name="cpf_cnpj_ent" />
	    </div>
	  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Senha" name="senha_ent" />
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Confirmar Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Telefone fixo" name="senha_ent_conf">
    </div>
  </div>
  
<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Telefone Celular" name="descricao_cont_tel">
    </div>
  </div>
  

<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Celular</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Confirmar Senha" name="descricao_cont_cel">
    </div>
  </div>
  

  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Cadastrar</button>
    </div>
  </div>


<?php	
	/*echo form_label('Nome Completo');
	echo form_input('nome_ent','');
		
	
	echo form_label('CPF/CNPJ');
	echo form_input('cpf_cnpj_ent','');
	
	
	echo form_label('Senha');
	echo form_password('senha_ent','');
	
	
	echo form_label('Confirmar Senha');
	echo form_password('senha_ent_conf');
	

	echo form_label('Telefone');
	echo form_input('descricao_cont_tel','');
	
	
	echo form_label('Celular');
	echo form_input('descricao_cont_cel','');
	*/
	echo form_fieldset_close();
	#echo form_submit('submit','Cadastrar','class="btn btn-default"');

/*
	echo form_hidden('id_ent','{id_ent}');
	echo form_hidden('ativo','{ativo}');
	echo form_hidden('tipo_ent','{tipo_ent}');
	echo form_hidden('id_end_temp','{id_end_temp}');
	echo form_hidden('id_cont','{id_cont}');
	echo form_hidden('id_tip','{id_tip}');
	echo form_hidden('id_vei','{id_vei}');
	echo form_hidden('login_ent','{login_ent}');
	echo form_hidden('senha_ent','{senha_ent}');
	echo form_hidden('dt_nasc_ent','{dt_nasc_ent}');
	echo form_hidden('ano_vei','{ano_vei}');

	echo form_label('Nome Completo');
	echo form_input('nome_ent','{nome_ent}');
	

	echo form_label('CPF/CNPJ');
	echo form_input('cpf_cnpj_ent','{cpf_cnpj_ent}');
	

	echo form_label('CEP');
	echo form_input('cep_end_temp','{cep_end_temp}');
	
	
	echo form_label('Rua');
	echo form_input('rua_end_temp','{rua_end_temp}');
	
	
	echo form_label('Número');
	echo form_input('num_end_temp','{num_end_temp}');
	
	
	echo form_label('Complemento');
	echo form_input('complemento_end_temp','{complemento_end_temp}');
	
	
	echo form_label('Bairro');
	echo form_input('bairro_end_temp','{bairro_end_temp}');
	
	
	echo form_label('Cidade');
	echo form_input('cidade_end_temp','{cidade_end_temp}');
	

	
	echo form_label('Telefone');
	echo form_input('descricao_cont_tel','{descricao_cont_tel}');
	
	
	echo form_label('Celular');
	echo form_input('descricao_cont_cel','{descricao_cont_cel}');
	
	
	echo form_fieldset_close();
	echo form_button('next','Avançar');
	

	echo form_fieldset('Dados Veiculos');
	
	echo form_label('Fabricante');
	echo form_input('fabricante_vei','{fabricante_vei}');

	
	echo form_label('Modelo');
	echo form_input('mod_vei','{mod_vei}');

	
	echo form_label('Placa');
	echo form_input('placa_vei','{placa_vei}');
	

	
	echo form_label('Acessórios');
	echo form_checkbox('','');
	echo form_checkbox('','');
	echo form_checkbox('','');
	echo form_checkbox('','');
	
	echo form_fieldset_close();

	echo form_button('next','Avançar');

	echo form_fieldset('Documentos');


	echo form_label('Sua foto');
	echo form_upload('foto');
	

	echo form_label('Identidade');
	echo form_upload('identidade');
	

	echo form_label('Carteria de Motorista');
	echo form_upload('carteira');
	

	echo form_label('Comprovante Residência');
	echo form_upload('residencia');
	

	echo form_fieldset_close();
	echo form_button('next','Avançar');


	echo form_fieldset('Termos de Uso');
	echo '
			Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

			Tradução para o inglês por H. Rackha, feita em 1914

			"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"

			Seção 1.10.33 de "de Finibus Bonorum et Malorum", escrita por Cícero em 45 AC"';

	
	echo form_checkbox('','');
	
	echo form_submit('submit','Confirmar');
	echo form_fieldset_close();
*/
	echo form_close();
?>
</section>