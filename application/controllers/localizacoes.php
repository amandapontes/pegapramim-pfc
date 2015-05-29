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
		
		$path_ics ='mpstst/js/';
		
		//Recebe o ponteiro do arquivo criado
		$fp = fopen($path_ics."pontos_usuarios.json","w");
	
		fwrite($fp,$output);
	
		fclose($fp);
	}

	public function get_pontos_by_id(){
		//echo "<pre>"; print_r($_POST);echo "</pre>";
		$_data = $_POST;
		$l =  new Localicacoe();
		if(!$_data['id_ent']){
			$l = $l->getAll();
		}
		else{
			$l = $l->get_by_id_ent($_data['id_ent']);	
		}

		$output = json_encode($l);
		
		$path_ics ='mpstst/js/';
		
		//Recebe o ponteiro do arquivo criado
		$fp = fopen($path_ics."pontos_usuarios.json","w");
	
		fwrite($fp,$output);
	
		fclose($fp);
	}


	public function busca(){
		//$p = new Propostas();
		//$p->getVrKm($this->session->userdata('id_ent'));
		$e = new Entidade();
		$id_logado = $this->session->userdata('id_ent');
		$dados['usuarios'] = $e->get_all(0, 'C'); 
		$this->get_pontos();
		$this->parser->parse('mapa_busca',$dados); 
	}
}