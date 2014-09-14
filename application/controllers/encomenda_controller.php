<?php


class Encomenda_Controller extends CI_Controller{

	public function index(){
		$e = new Encomenda();
		$encomendas = array();
		$encomendas['encomendas'] = $e->getEncomendas();
 		$this->parser->parse('index',array()); 

	 	$e = new Encomenda();
		$encomendas = array();
		$encomendas['encomendas'] = $e->getEncomendas() ;
		$encomendas['id_logado'] = $this->session->userdata('id_ent');
		$opcoes = new Opcoe();
		$vrKm = $opcoes->getVrKm($encomendas['id_logado'])->stored->vr_por_km;
		//echo $vrKm;
		//echo "<pre>"; echo print_r($opcoes->getVrKm($encomendas['id_logado'])); echo "</pre>";
			//echo "<pre>"; echo print_r($encomendas['encomendas']); echo "</pre>";
		foreach ($encomendas['encomendas'] as $key => $value) {
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
			$value->vr_medio = $vr_calc;
		}
		//echo $e->getEncomendas($_data);
	//	echo "<pre>"; echo print_r($encomendas); echo "</pre>";
//		echo "<pre>"; echo print_r($encomendas); echo "</pre>";
		$this->parser->parse('notificacao_new_encomenda',$encomendas);
	}

	public function enviar_proposta(){
		$_data = $this->input->post();
		$_data['id_ent_motoboy'] = $this->session->userdata('id_ent');
		//echo "<pre>";  echo print_r($_POST); echo "</pre>";
		$p = new Proposta();
		$p->salvar($_data);
	}
}