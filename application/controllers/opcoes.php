<?php

class Opcoes extends CI_Controller{

	public function index(){
		$o = new Opcoe();
		$o->getVrKm($this->session->userdata('id_ent'));
 		$this->parser->parse('opcoes',(array)$o->stored); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$_data['id_ent'] = $this->session->userdata('id_ent');
		$o = new Opcoe();
		if($o->salvar($_data)){
			$feedback['cod'] = '1';
	 		$feedback['msg'] = 'Opções salvas com sucesso.';
		}
		else{
			$feedback['cod'] = '0';
	 		$feedback['msg'] = 'Não foi possível salvar, tente novamente.';
		}
		echo 1;
	}
}