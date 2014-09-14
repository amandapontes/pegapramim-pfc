<?php


class Contato_Controller extends CI_Controller{

	public function index(){
		$c = new Contato();
 		$this->load->view('index'); 
	}
}