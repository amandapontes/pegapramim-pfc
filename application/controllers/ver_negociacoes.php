<?php

class Ver_Negociacoes extends CI_Controller{

	public function index(){
		$p = new Proposta();
		$id_logado = $this->session->userdata('id_ent');
		$dados['propostas'] = $p->getPropostasByIdUsuario($id_logado, 1);
		#echo "<pre>"; print_r($dados['propostas'][0]); echo "</pre>";
		#
		foreach ($dados['propostas'] as $key => &$value) {
		#echo "<pre>"; print_r($value); echo "</pre>";
			$value->status 		 = converte_status($value->status_pro);
			$value->status_color = converte_status_color($value->status_pro);
			
		}
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		if(empty($dados['propostas'])){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
 		$this->parser->parse('ver_negociacoes',$dados); 
	}

	public function custom_form(){
		$_data = $this->input->post();
		$_data['id_ent'] = $this->session->userdata('id_ent');
		$o = new Opcoe($_data['id_ent']);
		if($o->salvar($_data)){
			 redirect("inicio");
		}
	}
}