<?php


class Login_Controller extends CI_Controller{

	public function index(){
		$id = $this->session->userdata('id_ent');
		if(!empty($this->session->userdata['id_ent'])){
			 redirect("inicio");
		}
		//verifica_acesso($this->session->userdata('id_ent'),$this->session->userdata('tipo_ent'), true);
		$e = new Entidade();
		#echo "<pre>"; print_r($e); echo "</pre>";die;

		$dados 							= (array)$e->stored;
		$dados['nome_ent'] 				='';
		$dados['login_ent'] 			='';
		#$dados['descricao_cont_tel'] 	='';
		#$dados['descricao_cont_cel'] 	='';
 		$this->parser->parse('login',$dados); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$e = new Entidade();
		$temp = $e->verificar_login($_data['login_ent'], $_data['senha_ent']);
			#echo "<pre>"; print_r($temp); echo "</pre>";die;
		if(!empty($temp->stored->id_ent)){
			$this->login->criarSessao($e);
			$feedback['cod'] = '1';
	 		$feedback['msg'] = 'Bem Vindo <strong>'.$temp->stored->nome_ent.'</strong>';
	 		echo json_encode($feedback);
			
		//	$this->parser->parse('index',(array)$e->stored);
		}
		else{
			$feedback['cod'] = '0';
		 	$feedback['msg'] = 'Usuário ou senha incorretos';
		 	echo json_encode($feedback);
		}
	}

	public function atualizarLocalizacao(){
		$this->session->set_userdata('latitude_atual',$_GET['latitude']);
		$this->session->set_userdata('longitude_atual',$_GET['longitude']);
	}

	public function deslogar(){
		$this->login->deslogar();
	}
}