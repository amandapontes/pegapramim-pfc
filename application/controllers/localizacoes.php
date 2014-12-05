<?php

class Localizacoes extends CI_Controller{

	public function index(){
		//$p = new Propostas();
		//$p->getVrKm($this->session->userdata('id_ent'));
		$this->get_pontos();
 		$this->parser->parse('mapa_todos',array()); 
	}
	public function get_pontos(){
		$l =  new Localicacoe();
		$l = $l->getAll();
		$output = json_encode($l);
		
		$path_ics ='resources/json/';
		
		//Recebe o ponteiro do arquivo criado
		$fp = fopen($path_ics."pontos_usuarios.json","w");
	
		fwrite($fp,$output);
	
		fclose($fp);
	}
}