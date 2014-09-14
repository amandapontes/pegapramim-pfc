<?php


class Mapa extends CI_Controller{

	public function index(){
 		$this->parser->parse('mapa',array()); 
	}
}