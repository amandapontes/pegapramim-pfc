<?php


class Entidades extends CI_Controller{

	public function index(){
		$e = new Entidade();

		$retorno = (array)$e->stored;
		//echo "<pre>"; print_r($retorno);echo "</pre>";
		$retorno->readonly_email = false;
		$retorno->hide_ativo	 = '1';
		$retorno->ativo 		 = 1;
 		$this->parser->parse('cadastros/entidades',$retorno); 
	}
	public function custom_form($save = TRUE){

		$_data = $this->input->post();
		$e = new Entidade();
		//$end = new Enderecos_Temp();
		//$vei = new Veiculos_Temp();
		if(!isset($_data['ativo'])){
			$_data['ativo'] 	= 1;
		}
		if($_data['ativo'] != 1){
			$_data['ativo'] = 0;
		}
		//echo "<pre>"; print_r($_data);echo "</pre>";
		#echo "<pre>"; print_r($this->upload->data()); "</pre>";
		$temp = $e->verificar_existe($_data['login_ent']);
		#echo $this->session->userdata('id_ent');
		$id_temp1 = $temp->stored->id_ent;
		$id_sessao = $this->session->userdata('id_ent');

		if(!empty($id_temp1) && empty($id_sessao)){
			$feedback['cod'] = '0';
		 	$feedback['msg'] = 'Usuário já existe';
		 	echo json_encode($feedback);
			return false;
		}
		
		if($e->salvar($_data)){
			$_data['id_ent']        	= $e->id;
			$e->stored->id_ent	        = $e->id;
			//echo "<pre>"; print_r($e->id); "</pre>";
			$id_sessao = $this->session->userdata('id_ent');
			if(empty($id_sessao)){
				$this->login->criarSessao($e);		
			}
		
			$feedback['cod'] = '1';
	 		$feedback['msg'] = 'Olá <strong>'.$temp->stored->nome_ent.'</strong>, suas informações foram salvas com sucesso';
	 		echo json_encode($feedback);
			
		}
		//-$this->parser->parse('cadastros/entidade',array());
	}

	public function load_user($id = FALSE){
		$e = new Entidade();
		$id_logado = ($id != FALSE)? $id : $this->session->userdata('id_ent');
		if($id == '-1'){
			$_data[0]  = $e->stored;
			$_data[0]->readonly_email = false;
			$_data[0]->ativo = 1;
			$_data[0]->tipo = "A";
			$_data[0]->novo_adm = 1;
			$tipo = "A";
		}
		else{
			$tipo = $this->session->userdata('tipo');
			$_data = $e->get_by_id($id_logado);
			$_data[0]->readonly_email = true;
		}
		if($tipo == 'A'){
			$_data[0]->hide_ativo = '';
			
		}
		else{
			$_data[0]->hide_ativo = '1';
		}
		#echo "<pre>"; print_r($_data);echo "</pre>";
 		$this->parser->parse('cadastros/entidades',$_data[0]); 
	}

	public function listagem($tipo){
		//enviar_email("amandapontes.com@gmail.com", "Teste email","peidei");
		//enviar_email_teste( "amandapontes.com@gmail.com", "Teste email","peidei",$replay_to="lucashenriqueps93@gmail.com",$mailtype='text');
		$e = new Entidade();
		$id_logado = $this->session->userdata('id_ent');
		//echo "select * from entidades where entidades.id_ent = 'C' and entidades.id_ent != ". $id_logado ." order by nome_ent ASC ";die;
		$dados['usuarios'] = $e->get_all($id_logado, $tipo);
		//echo "<pre>"; print_r($tipo); echo "</pre>";
		//echo "<pre>"; print_r($dados); echo "</pre>";
		#
		
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		if(empty($dados['usuarios'])){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
		$dados['tipo_listagem']		= 'Clientes';
		$dados['hide_cadastrar']	= 'none';
		if($tipo == 'A'){
		$dados['hide_cadastrar']	= '';
			$dados['tipo_listagem']	= 'Administradores';
		}
 		$this->parser->parse('ver_entidades',$dados); 
	}

public function deletar($id_ent){
			$e = new Entidade();
			$retorno = $e->verificaPodeDeletar($id_ent);

			if(empty($retorno)){
				$e->deletar($id_ent);
				$feedback['cod'] = '1';
		 		$feedback['msg'] = 'Cliente excluído com sucesso';
		 		echo json_encode($feedback);
				
			//	$this->parser->parse('index',(array)$e->stored);
			}
			else{
				$e->update_ativo($id_ent,0);
				$feedback['cod'] = '1';
			 	$feedback['msg'] = 'Cliente desativado com sucesso.';
			 	echo json_encode($feedback);
			}
	}
/*
	function do_upload($id){

		$config['upload_path'] = './././resources/img/'.$id;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->upload->initialize($config);


			echo "<pre>"; print_r($this->upload->data()); echo "</pre>";
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());

			echo "<pre>"; print_r($error); echo "</pre>";
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_success', $data);
		}
	}
*/
}