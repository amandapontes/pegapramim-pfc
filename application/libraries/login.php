<?php
class Login{

	function Login(){
		$this->CI =& get_instance();
		$this->session = & $this->CI->session;
	}

	public function is_logado(){
		$id_sessao = $this->session->userdata('id_ent');
		if(!empty($id_sessao)){
			return true;
		}
		return false;
	}

	public function criarSessao($e){
		//echo "<pre>"; print_r($e->stored); echo "</pre>";die;
		$this->session->set_userdata('id_ent',$e->stored->id_ent);
		$this->session->set_userdata('nome_ent',$e->stored->nome_ent);
	}
	public function deslogar(){
		$this->session->sess_destroy();
		redirect("/../");
	}
}