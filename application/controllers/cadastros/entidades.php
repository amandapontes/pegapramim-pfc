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
	public function custom_form(){

		$_data = $this->input->post();
		$e = new Entidade();
		//$end = new Enderecos_Temp();
		$vei = new Veiculos_Temp();
		
		//echo "<pre>"; print_r($this->upload->data()); "</pre>";
		if($e->salvar($_data)){
			$_data['id_ent']        = $e->id;
			
			$c = new Contato();
			$c->salvar($_data);
			
			//echo "<pre>"; print_r($e->id); "</pre>";
			
			$this->login->criarSessao($e);
			//$this->do_upload($_data['id_ent']);
			//$end->salvar($_data);
			//$vei->salvar($_data);
		}

		verifica_acesso($_data['id_ent'],$this->session->userdata('tipo_ent'), false);
		
		//-$this->parser->parse('cadastros/entidade',array());
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