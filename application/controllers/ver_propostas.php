<?php

class Ver_Propostas extends CI_Controller{

	public function index(){
		//$p = new Propostas();
		//$p->getVrKm($this->session->userdata('id_ent'));
 		$this->parser->parse('ver_propostas',array()); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$_data['id_ent'] = $this->session->userdata('id_ent');
		$o = new Opcoe($_data['id_ent']);
		if($o->salvar($_data)){
			 redirect("inicio");
		}
	}
}