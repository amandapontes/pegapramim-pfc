<?php


class Landing_Page extends CI_Controller{

	public function index(){
 		$this->parser->parse('site/landing_page',array()); 
	}

	public function save_news(){
		$n = new News_Letter();
		if($n->salvar($_POST)){
		}
	}
}