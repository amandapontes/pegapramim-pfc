<?php


class Login_Controller extends CI_Controller{

	public function index(){
		//verifica_acesso($this->session->userdata('id_ent'),$this->session->userdata('tipo_ent'), true);
		$e = new Entidade();
		#echo "<pre>"; print_r($e); echo "</pre>";die;

		$dados 							= (array)$e->stored;
		$dados['nome_ent'] 				='';
		$dados['login_ent'] 			='';
		$dados['descricao_cont_tel'] 	='';
		$dados['descricao_cont_cel'] 	='';

 		$this->parser->parse('login',$dados); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$e = new Entidade();
		$temp = $e->verificar_login($_data['login_ent'], $_data['senha_ent']);
		//	echo "<pre>"; print_r($e); echo "</pre>";die;
		if(!empty($temp->stored->id_ent)){
			$this->login->criarSessao($e);
			echo 1;
		//	$this->parser->parse('index',(array)$e->stored);
		}
		verifica_acesso($temp->stored->id_ent,$e->stored->tipo_ent);
		echo 0;
	}

	public function atualizarLocalizacao(){
		$this->session->set_userdata('latitude_atual',$_GET['latitude']);
		$this->session->set_userdata('longitude_atual',$_GET['longitude']);
	}

	public function deslogar(){
		$this->login->deslogar();
	}
}