<?php


class Landing_Page extends CI_Controller{

	public function index(){
 		$this->parser->parse('site/landing_page',array()); 
	}

	public function save_news(){
		$n = new News_Letter();
		#echo "<pre>"; print_r($_POST); echo "</pre>";
		$dados = $_POST;
		if($n->salvar($dados)){
			echo 1;
		}
		else{
			echo 0;
		}
	}
}