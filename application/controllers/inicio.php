<?php
class Inicio extends CI_Controller{

	public function index(){

		if(empty($this->session->userdata['id_ent'])){
			 redirect(base_url());
		}
	
		$e = new Encomenda();
		$encomendas = array();
 		$this->parser->parse('index',array()); 

		$encomendas = array();
		$encomendas['exibe_notificacao'] = "none"; 
		$encomendas['encomendas'] = $e->getEncomendasById($this->session->userdata['id_ent'], "'D','S'"); 
		$encomendas['id_logado']  = $this->session->userdata('id_ent');
		$encomendas['nome_ent']   = $this->session->userdata('nome_ent');
		$a = new Avaliacoes();
		
		$opcoes = new Opcoe();
		$dados_opcoes = $opcoes->getVrKm($encomendas['id_logado']);
		$vrKm = $dados_opcoes->stored->vr_por_km;
		$distanciaLimite = $dados_opcoes->stored->distancia_limite;
		//echo $vrKm;
		//echo "<pre>"; echo print_r($opcoes->getVrKm($encomendas['id_logado'])); echo "</pre>";
			//echo "<pre>"; echo print_r($encomendas['encomendas']); echo "</pre>";
		if($this->session->userdata['tipo'] != 'A'){
			foreach ($encomendas['encomendas'] as $key => $value) {
				$value->formatted_address_origem 	= '';
				$value->formatted_address 			= '';
				$value->vr_medio          			= '';
				$value->duracao           			= '';
				$value->distancia         			= '';
				$value->media						= 0;
				$value->media						= empty($value->media[0]->media)? 0 : $value->media[0]->media;
				$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=". $value->latitude_cli  . "," . $value->longitude_cli."&sensor=false"     );
							
			
		//		echo $json;
		  //   	echo "http://maps.google.com/maps/api/geocode/json?address=". $value->latitude_enco . "," . $value->longitude_enco ."&sensor=true";
			
				$json = json_decode($json);
			
			//	echo "<pre>"; echo print_r($json); echo "</pre>";

			//	echo " ".$json->status;
				//echo $json->status . "merda";
				$endCompletoEncomenda_origem='';
				if($json->status == 'OK' || $json->status == 'ok'){
					$value->formatted_address_origem = $json->results['0']->formatted_address;
					$endCompletoEncomenda_origem = str_replace(" ", "+", $value->formatted_address_origem);
				}


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

			//	$json = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$this->session->userdata('latitude_atual').",". $this->session->userdata('longitude_atual')."&destinations=".$endCompletoEncomenda."&mode=car&language=pt-BR&sensor=true");
				$json = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$value->latitude_cli.",". $value->longitude_cli."&destinations=".$endCompletoEncomenda."&mode=car&language=pt-BR&sensor=true");
			//echo "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$this->session->userdata('latitude_atual').",". $this->session->userdata('longitude_atual')."&destinations=".$endCompletoEncomenda."&mode=car&language=pt-BR&sensor=true" ;
				$json = json_decode($json);
				$distancia_quebrada[0] = 0;
					//echo "<pre>"; echo print_r($json->rows['0']->elements['0']->status); echo "</pre>";
				if(!empty($json->rows)){

					if($json->rows['0']->elements['0']->status == 'OK'){
						$value->distancia = $json->rows['0']->elements['0']->distance->text;

						$distancia_quebrada = explode(" ", $value->distancia);

						if(empty($distancia_quebrada)){
							$distancia_quebrada[0] = 0;
						}
						
						if($distancia_quebrada[1] == 'km'){
							$vr_calc = $vrKm * str_replace(',', '.', $distancia_quebrada[0]);
						}else{
							$vr_calc = $vrKm ;
						}
					$value->duracao = $json->rows['0']->elements['0']->duration->text;
					$value->vr_medio = $vr_calc;
					}
				}
				else{
					$distancia_quebrada[0] = 0;
				}
				if(str_replace(',', '.', $distancia_quebrada[0]) <= $distanciaLimite && $distanciaLimite > 0){
					unset($encomendas['encomendas'][$key]);
				}
			}
		}
		//echo $e->getEncomendas($_data);
	//	echo "<pre>"; echo print_r($encomendas); echo "</pre>";
//		echo "<pre>"; echo print_r($encomendas); echo "</pre>";
		if(!empty($encomendas['encomendas'])){
			$encomendas['exibe_notificacao'] = "block";
		}
		if($this->session->userdata['tipo'] != 'A') $this->parser->parse('notificacao_new_encomenda',$encomendas);

 		$this->parser->parse('footer', array());

	}
}