<?php
class Inicio extends CI_Controller{

	public function index(){
		if(empty($this->session->userdata['id_ent'])){
			 redirect("/");
		}
		$e = new Encomenda();
		$encomendas = array();
 		$this->parser->parse('index',array()); 

	 	$e = new Encomenda();
		$encomendas = array();
		$encomendas['exibe_notificacao'] = "none";
		$encomendas['encomendas'] = $e->getEncomendasById($this->session->userdata['id_ent']) ;
		$encomendas['id_logado']  = $this->session->userdata('id_ent');
		$encomendas['nome_ent']   = $this->session->userdata('nome_ent');
		$opcoes = new Opcoe();
		$vrKm = $opcoes->getVrKm($encomendas['id_logado'])->stored->vr_por_km;
		//echo $vrKm;
		//echo "<pre>"; echo print_r($opcoes->getVrKm($encomendas['id_logado'])); echo "</pre>";
			//echo "<pre>"; echo print_r($encomendas['encomendas']); echo "</pre>";
		foreach ($encomendas['encomendas'] as $key => $value) {

			$value->formatted_address = '';
			$value->vr_medio          = '';
			$value->duracao           = '';
			$value->distancia         = '';

			$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=". $value->latitude_enco  . "," . $value->longitude_enco."&sensor=false"     );
		
	//		echo $json;
	  //   	echo "http://maps.google.com/maps/api/geocode/json?address=". $value->latitude_enco . "," . $value->longitude_enco ."&sensor=true";
		
			$json = json_decode($json);
		
		//	echo "<pre>"; echo print_r($json); echo "</pre>";

		//	echo " ".$json->status;
			//echo $json->status . "merda";
			$endCompletoEncomenda='';
			if($json->status == 'OK' || $json->status == 'ok'){
				$value->formatted_address = $json->results['0']->formatted_address;
				$endCompletoEncomenda = str_replace(" ", "+", $value->formatted_address);
			}

			$json = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$this->session->userdata('latitude_atual').",". $this->session->userdata('longitude_atual')."&destinations=".$endCompletoEncomenda."&mode=car&language=pt-BR&sensor=true");
		//echo "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$this->session->userdata('latitude_atual').",". $this->session->userdata('longitude_atual')."&destinations=".$endCompletoEncomenda."&mode=car&language=pt-BR&sensor=true" ;
			$json = json_decode($json);

				//echo "<pre>"; echo print_r($json->rows['0']->elements['0']->status); echo "</pre>";
			if(!empty($json->rows)){

				if($json->rows['0']->elements['0']->status == 'OK'){
					$value->distancia = $json->rows['0']->elements['0']->distance->text;

					$distancia_quebrada = explode(" ", $value->distancia);

					
					if($distancia_quebrada[1] == 'km'){
						$vr_calc = $vrKm * str_replace(',', '.', $distancia_quebrada[0]);
					}else{
						$vr_calc = $vrKm ;
					}
				$value->duracao = $json->rows['0']->elements['0']->duration->text;
				$value->vr_medio = $vr_calc;
				}
			}
		}
		//echo $e->getEncomendas($_data);
	//	echo "<pre>"; echo print_r($encomendas); echo "</pre>";
//		echo "<pre>"; echo print_r($encomendas); echo "</pre>";
		if(!empty($encomendas['encomendas'])){
			$encomendas['exibe_notificacao'] = "block";
		}
		$this->parser->parse('notificacao_new_encomenda',$encomendas);

 		$this->parser->parse('footer', array());

	}
}