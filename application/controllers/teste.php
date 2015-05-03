<?php


class Teste extends CI_Controller{

	public function index(){
		$e = new Entidade();
 		$this->load->view('welcome_message'); 
	}
	public function custom_form(){
		$_data = $this->input->post();
		//echo "<pre>"; print_r($_data); "</pre>";
		$e = new Entidade();
		$e->save($_data);
		//-$this->parser->parse('cadastros/entidade',array());
	}

}