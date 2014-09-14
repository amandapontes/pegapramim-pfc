<?php


class Solicitar_Motoboy extends CI_Controller{

	public function index(){
		$e = new Entidade();
		$_data['id_logado'] = $this->session->userdata('id_ent');
 		$this->parser->parse('solicitar_motoboy',$_data); 
	}
	public function custom_save(){
		$_data = $this->input->post();
		//echo "<print>"; print_r($_data); echo "</pre>";
		$_data['id_ent'] =  $this->session->userdata['id_ent'];
		$e = new Encomenda();
		if($e->salvar($_data)){
			 redirect("inicio");
		}
	}
}