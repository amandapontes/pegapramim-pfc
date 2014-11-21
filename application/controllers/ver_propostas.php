<?php

class Ver_Propostas extends CI_Controller{

	public function index(){
		$p = new Proposta();
		$id_logado = $this->session->userdata('id_ent');
		$dados['propostas'] = $p->getPropostasByIdUsuario($id_logado, 0);
		#echo "<print>"; print_r($dados['propostas'][0]); echo "</pre>";
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		if(empty($dados['propostas'])){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
 		$this->parser->parse('ver_propostas',$dados); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$_data['id_ent'] = $this->session->userdata('id_ent');
		$o = new Opcoe($_data['id_ent']);
		if($o->salvar($_data)){
			 redirect("inicio");
		}
	}

	public function atualizar_aprovado($id, $status){
		$p = new Proposta();
		$p->atualizar_aprovado($id, $status);
	}

	public function deletar($id){
		$p = new Proposta();
		$p->deletar($id);
	}
}