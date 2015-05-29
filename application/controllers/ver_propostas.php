<?php

class Ver_Propostas extends CI_Controller{

	public function index(){
		$p = new Proposta();
		$id_logado = $this->session->userdata('id_ent');
		
		$dados['propostas'] 		= $p->getPropostasByIdUsuario($id_logado, 0);
		$dados['propostas_feito'] 	= $p->getPropostasByIdUsuarioFeito($id_logado);
		
		//echo "<print>"; print_r($dados); echo "</pre>";
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		$dados['nenhum_resultado_feito'] = 'display:none';
		$dados['nenhum_resultado_tabela_feito'] = 'display:block';

		if(empty($dados['propostas'])){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
		if(empty($dados['propostas_feito'])){
			$dados['nenhum_resultado_feito'] = 'display:block';
			$dados['nenhum_resultado_tabela_feito'] = 'display:none';
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
	public function atualizar_status($id, $status){
		$p = new Proposta();
		$n = new Negociacoes();
		$_data['id_pro']	= $id;
		$ln = $n->salvar($_data, false);

		$p->atualizar_status($id, $status);
	}

	public function deletar($id){
		$p = new Proposta();
		$dados_temp = $p->getPropostaById($id);
		$p->deletar($id);
		if($dados_temp[0]->id_ent_ajudante == $this->session->userdata('id_ent')){
			echo "Proposta excluída.";	
		}
		else{
			echo "Proposta recusada.";
		}
		enviar_email($dados_temp[0]->login_ent ,'Proposta Recusada','Sua proposta para a encomenda '.$dados_temp[0]->descricao_enc. 'foi recusada por '. $this->session->userdata('nome_ent'));
	}
}