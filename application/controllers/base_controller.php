<?php

class Base_Controller extends CI_Controller{
	
	function __contruct(){
		if(!$this->login_permission->is_logado()){
			redirect('index.php/intranet/login');
		}
	}	
}