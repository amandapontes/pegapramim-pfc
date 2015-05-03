<?php


class Solicitar_Motoboy extends CI_Controller{

	public function index(){
		$e = new Entidade();
		$_data['id_logado'] = $this->session->userdata('id_ent');
 		$this->parser->parse('solicitar_motoboy',$_data); 
	}
	public function custom_save(){
		$_data = $this->input->post();
		//echo "<print>"; print_r($_data); echo "</pre>";
		$_data['id_ent'] =  $this->session->userdata['id_ent'];
		$e = new Encomenda();
		if($e->salvar($_data)){
			$feedback['cod'] = '1';
	 		$feedback['msg'] = 'Item cadastrado com sucesso.';
	 		echo json_encode($feedback);
		}
	}

	public function load_list(){
		$e = new Encomenda();
		$id_logado = $this->session->userdata('id_ent');
		
		$dados['encomendas'] = $e->getApenasEncomendasById($id_logado);
		#echo "<print>"; print_r($dados['propostas'][0]); echo "</pre>";
		$dados['nenhum_resultado'] = 'display:none';
		$dados['nenhum_resultado_tabela'] = 'display:block';
		if(empty($dados['encomendas'])){
			$dados['nenhum_resultado'] = 'display:block';
			$dados['nenhum_resultado_tabela'] = 'display:none';
		}
		#echo "<print>"; print_r($dados['encomendas']); echo "</pre>";
 		$this->parser->parse('ver_encomendas',$dados); 
	}

}