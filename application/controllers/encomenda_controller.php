<?php


class Encomenda_Controller extends CI_Controller{

	public function index(){
		$e = new Encomenda();
		$encomendas = array();
		$encomendas['encomendas'] = $e->getEncomendas();
 		$this->parser->parse('index',array()); 

	 	$e = new Encomenda();
		$encomendas = array();
		$encomendas['exibe_notificacao'] = "none";
		$encomendas['encomendas'] = $e->getEncomendas() ;
		$encomendas['id_logado'] = $this->session->userdata('id_ent');
		$opcoes = new Opcoe();
		$vrKm = $opcoes->getVrKm($encomendas['id_logado'])->stored->vr_por_km;
		//echo $vrKm;
		//echo "<pre>"; echo print_r($opcoes->getVrKm($encomendas['id_logado'])); echo "</pre>";
			//echo "<pre>"; echo print_r($encomendas['encomendas']); echo "</pre>";
		foreach ($encomendas['encomendas'] as $key => &$value) {
			
			$value->formatted_address_origem = '';
			$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=". $value->longitude_cli  . "," . $value->latitude_cli."&sensor=false");
	//	echo "http://maps.google.com/maps/api/geocode/json?address=". $value->latitude_enco . "," . $value->longitude_enco ."&sensor=true";
			$json = json_decode($json);
			//echo $json->status . "merda";
			//echo "<pre>";  echo print_r($json); echo "</pre>";
			if($json->status == 'OK' || $json->status == 'ok'){
				$value->formatted_address_origem = $json->results['0']->formatted_address;

				$endCompletoEncomenda_origem = str_replace(" ", "+", $value->formatted_address_origem);
			}

			$value->formatted_address = '';
			$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=". $value->longitude_enco  . "," . $value->latitude_enco."&sensor=false");
	//	echo "http://maps.google.com/maps/api/geocode/json?address=". $value->latitude_enco . "," . $value->longitude_enco ."&sensor=true";
			$json = json_decode($json);
			//echo $json->status . "merda";
			//echo "<pre>";  echo print_r($json); echo "</pre>";
			if($json->status == 'OK' || $json->status == 'ok'){
				$value->formatted_address = $json->results['0']->formatted_address;

				$endCompletoEncomenda = str_replace(" ", "+", $value->formatted_address);
			}

			$json = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$this->session->userdata('longitude_atual').",". $this->session->userdata('latitude_atual')."&destinations=".$endCompletoEncomenda."&mode=car&language=pt-BR&sensor=true");
		//	echo "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$this->session->userdata('latitude_atual').",". $this->session->userdata('longitude_atual')."&destinations=".$endCompletoEncomenda."&mode=car&language=pt-BR&sensor=true" ;
			$json = json_decode($json);
			if($json->status == 'OK' || $json->status == 'ok'){
				$value->distancia = $json->rows['0']->elements['0']->distance->text;

				$distancia_quebrada = explode(" ", $value->distancia);

				//echo "<pre>"; echo print_r($distancia_quebrada); echo "</pre>";
				if($distancia_quebrada[1] == 'km'){
					$vr_calc = $vrKm * $distancia_quebrada[0];
				}else{
					$vr_calc = $vrKm ;
				}
			$value->duracao = $json->rows['0']->elements['0']->duration->text;
			}
			
			$value->vr_medio = 99;

		}
		//echo $e->getEncomendas($_data);
		#echo "<pre>"; echo print_r($encomendas); echo "</pre>";
//		echo "<pre>"; echo print_r($encomendas); echo "</pre>";
//		
		if(!empty($encomendas['encomendas'])){
			$encomendas['exibe_notificacao'] = "block";
		}
		echo "<pre>"; echo print_r($encomendas); echo "</pre>";
		$this->parser->parse('notificacao_new_encomenda',$encomendas);
	}

	public function enviar_proposta(){
		$_data = $_POST;
		$_data['id_ent_ajudante'] = $this->session->userdata('id_ent');
		//echo "<pre>";  echo print_r($_data); echo "</pre>";die;
		$p = new Proposta();
		$p->salvar($_data);
		$feedback['cod'] = '1';
 		$feedback['msg'] = 'Proposta enviada.';
 		echo json_encode($feedback);
		/*$feedback['cod'] = '1';
 		$feedback['msg'] = 'Proposta.';
 		echo json_encode($feedback);*/
	}

public function denunciar_item($id_enc, $denunciado = 'D', $motivo_da_denuncia = FALSE){
		$_data = $_POST;
		#echo "<pre>";  echo print_r($_data); echo "</pre>";die;
		$e = new Encomenda();

		if($motivo_da_denuncia == FALSE && $denunciado == 'D') {
			$motivo_da_denuncia = $_data['motivo_denuncia'];

		}
		$e->denunciar($id_enc, $denunciado, $motivo_da_denuncia);
		$feedback['cod'] = '1';
		if($denunciado == 'B'){
			$feedback['msg'] = 'Denúncia Aprovada.';
		}
		else if($denunciado == 'D'){
			$feedback['msg'] = 'Item denúnciado.';
		}
		else if($denunciado == 0){
			$feedback['msg'] = 'Denúncia Recusada';
		}
 		echo json_encode($feedback);
		/*$feedback['cod'] = '1';
 		$feedback['msg'] = 'Proposta.';
 		echo json_encode($feedback);*/
	}

	public function load_denuncia($id_enc, $situacao_enco){
		//echo "<pre>";echo print_r($dados["msg"]); echo "</pre>"; echo "A";
		$dados['id_enc'] 		= $id_enc;
		$dados['situacao_enco'] = $situacao_enco;
 		$this->parser->parse('denuncia_modal', $dados); 
	}

		public function deletar($id_enc){
			$e = new Encomenda();
			$retorno = $e->verificaPodeDeletar($id_enc);
			//echo "<pre>"; print_r($retorno); echo "</pre>";
			if(empty($retorno)){
				$e->deletar($id_enc);
				$feedback['cod'] = '1';
		 		$feedback['msg'] = 'Item excluído com sucesso.';
		 		echo json_encode($feedback);
				
			//	$this->parser->parse('index',(array)$e->stored);
			}
			else{
				$feedback['cod'] = '0';
			 	$feedback['msg'] = 'Item não pode ser apagado, pois possui proposta aceita.';
			 	echo json_encode($feedback);
			}
	}
}