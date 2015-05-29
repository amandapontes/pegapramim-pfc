<?php

class Ver_Negociacoes extends CI_Controller{

	public function index(){
		//enviar_email("amandapontes.com@gmail.com", "Teste email","peidei");
		//enviar_email_teste( "amandapontes.com@gmail.com", "Teste email","peidei",$replay_to="lucashenriqueps93@gmail.com",$mailtype='text');
		$p = new Proposta();
		$id_logado = $this->session->userdata('id_ent');
		$dados['propostas'] = $p->getPropostasByIdUsuario($id_logado, 1);
		$dados['propostas_feito'] = $p->getPropostasByIdUsuarioFeito($id_logado);
		#echo "<pre>"; print_r($dados); echo "</pre>";
		
		foreach ($dados['propostas'] as $key => &$value) {
		#echo "<pre>"; print_r($value); echo "</pre>";
		if($value->status_pro != 'N'){
			$value->possui_acoes = "none";
		}
		else{
			$value->possui_acoes = "";
		}
			$value->status 		 = converte_status($value->status_pro);
			$value->status_color = converte_status_color($value->status_pro);
			
		}
		foreach ($dados['propostas_feito'] as $key => &$value) {
		#echo "<pre>"; print_r($value); echo "</pre>";
		if($value->status_pro != 'N'){
			$value->possui_acoes = "none";
		}
		else{
			$value->possui_acoes = "";
		}
			$value->status 		 = converte_status($value->status_pro);
			$value->status_color = converte_status_color($value->status_pro);
			
		}
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		if(empty($dados['propostas'])){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
		$dados['nenhum_resultado_feito'] = 'display:none';
		$dados['nenhum_resultado_tabela_feito'] = 'display:block';
		if(empty($dados['propostas_feito'])){
			$dados['nenhum_resultado_feito'] = 'display:block';
			$dados['nenhum_resultado_tabela_feito'] = 'display:none';
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

	public function add_mensagem_negociao(){
		
		$_data 	= $this->input->post();
		#echo "<pre>"; print_r($_data); echo "</pre>";
		$n 		= new Negociacoes();
		$p 		=  new Proposta();
		$enco 	= new Encomenda();
		$dados_temp = $p->getPropostaById($_data['id_pro']);
		$_data['id_ent_enviou'] = $this->session->userdata('id_ent');
		#echo "<pre>"; print_r($_data); echo "</pre>";
		$ln = $n->salvar($_data);
	
		if($ln){
			$feedback['cod'] = '1';
	 		$feedback['msg'] = 'Mensagem enviada.';
	 		enviar_email($dados_temp[0]->login_ent ,'Nova Mensagem','Você recebeu uma nova mensagem de '. $this->session->userdata('nome_ent') . ' referente a encomenda '. $dados_temp[0]->descricao_enc);
		}
		else{
			$feedback['cod'] = '0';
	 		$feedback['msg'] = 'Não foi possível enviar a mensagem, tente novamente.';
		}
		echo json_encode($feedback);
	}

	public function load_conversa($id_pro, $id_nego){
		$ln =  new Lista_Negociacoes();
		$dados["msg"] = $ln->getAllNego($id_pro);
		$dados["id_nego"] = $id_nego;
		//echo "<pre>";echo print_r($dados["msg"]); echo "</pre>"; echo "A";
		
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		$dados["readonly_msg"] 			  = '';
		if(!empty($dados["msg"])){
			$dados["id_pro"] = $dados["msg"][0]->id_pro;
			$status = $dados["msg"][0]->status_pro;
			if($status != 'N'){
				$dados["readonly_msg"] 	  = 'display:none';
			}
		}
		if(empty($dados["msg"][0]->id_lista_nego)){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
 		$this->parser->parse('negociacao_conversa', $dados); 
	}


}