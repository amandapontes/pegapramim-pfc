<?php

class Ver_Avaliacoes extends CI_Controller{

	public function index(){
		//$p = new Propostas();
		//$p->getVrKm($this->session->userdata('id_ent'));
		$av =  new Avaliacoes();
		$id_logado = $this->session->userdata('id_ent');
		$dados['avaliacoes'] = $av->getAvaliacoes($id_logado);
		// echo "<print>"; print_r($dados['avaliacoes']); echo "</pre>";
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		if(empty($dados['avaliacoes'])){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
 		$this->parser->parse('ver_avaliacoes',$dados); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$_data['id_ent'] = $this->session->userdata('id_ent');
		$o = new Opcoe($_data['id_ent']);
		if($o->salvar($_data)){
			 redirect("inicio");
		}
	}

	public function enviar_avialiacao($id_pro , $qtd_estrelas){
		$_data 	= $this->input->post();
		# echo "<print>"; print_r($_data); echo "</pre>";
		$av = new Avaliacoes();
		$_data['id_pro'] 	= $id_pro; 
		$_data['nota_ava'] 	= $qtd_estrelas; 
		$retorno = $av->salvar($_data);
		if($retorno){
			$feedback['cod'] = '1';
		 	$feedback['msg'] = 'Avaliação realizada com sucesso.';
		}
		else{
			$feedback['cod'] = '0';
		 	$feedback['msg'] = 'Não foi possível avaliar';
		}
		echo json_encode($feedback);
	}
}