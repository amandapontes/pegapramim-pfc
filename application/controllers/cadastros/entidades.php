<?php


class Entidades extends CI_Controller{

	public function index(){
		$e = new Entidade();

		$retorno = (array)$e->stored;
 		$this->parser->parse('cadastros/entidades',$retorno); 
	}
	public function custom_form($save = TRUE){

		$_data = $this->input->post();
		$e = new Entidade();
		//$end = new Enderecos_Temp();
		//$vei = new Veiculos_Temp();
		#echo "<pre>"; print_r($_data);echo "</pre>";
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

	public function load_user(){
		$e = new Entidade();
		$id_logado = $this->session->userdata('id_ent');
		$_data = $e->get_by_id($id_logado);
		#echo "<pre>"; print_r($_data);echo "</pre>";
 		$this->parser->parse('cadastros/entidades',$_data[0]); 
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