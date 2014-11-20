<?php


class Entidades extends CI_Controller{

	public function index(){
		$e = new Entidade();
		//$end = new Enderecos_Temp();
		$vei = new Veiculos_Temp();
		//$c = new Contato();

		$retorno = array_merge((array)$e->stored,(array)$vei->stored);
		$retorno['descricao_cont_tel']='';
		$retorno['descricao_cont_cel']='';
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
		if(!empty($temp->stored->id_ent)){
			echo 0;
			return false;
		}
		if($e->salvar($_data)){
			$_data['id_ent']        	= $e->id;
			$e->stored->id_ent	        = $e->id;
			#$c = new Contato();
			#$c->salvar($_data);
			
			//echo "<pre>"; print_r($e->id); "</pre>";
			
			$this->login->criarSessao($e);
			//$this->do_upload($_data['id_ent']);
		}

		$id = $this->session->userdata('id_ent');
		echo $id;
		
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