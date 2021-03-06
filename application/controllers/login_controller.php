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
 		$this->parser->parse('login',$dados); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$e = new Entidade();
		$temp = $e->verificar_login($_data['login_ent'], $_data['senha_ent']);
			#echo "<pre>"; print_r($temp); echo "</pre>";die;
		if(!empty($temp->stored->id_ent)){
			if(empty($temp->stored->ativo)){
				$feedback['cod'] = '0';
		 		$feedback['msg'] = 'Usuário não esta ativo, entre em contato com o administrador pelo email <strong>pegapramimpfc@gmail.com</strong>';
			}else{
				$this->login->criarSessao($e);
				$feedback['cod'] = '1';
	 			$feedback['msg'] = 'Bem Vindo <strong>'.$temp->stored->nome_ent.'</strong>';
			}
			
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
		$id = $this->session->userdata('id_ent');
		if(!empty($id)){
			$l =  new Localicacoe();
			$_data['latitude'] 	= $_GET['latitude'];
			$_data['longitude'] = $_GET['longitude'];
			$_data['id_ent'] 	= $id;
			$l->salvar($_data);
		}
	}

	public function deslogar(){
		$this->login->deslogar();
	}
}