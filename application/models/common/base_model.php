<?php

class Base_Model extends DataMapper{

	public $db;	

	function Base_Model(){

		$CI 				= &get_instance();
		$this->db 			= $CI->db;
		parent::DataMapper();

	}

	 /* Salva a entidade no banco a partir de um array de dados
	 * @param object $data
	 * @param bool $tratar_null Aponta se valores NULL devem ser alterados para constante __NULL__ (afim de gravar NULL no banco)
	 * @return 
	 */
	function save_from_data($data, $tratar_null=false){
		//limpando objeto antes de persistir dados
		$this->clear();
		//Verificando se o campo possui 'id' vazio
		if(empty($data[$this->id_field])){
			unset($data[$this->id_field]);
		}
		//para cada dado a ser gravado, verifica se o campo existe na tabela
		foreach($data as $field=>$value){
			if(in_array($field, $this->fields)){
				// Se o valor for nulo, e a flag para tratar valores NULL for verdadeira, altera NULL para constante __NULL__ (definida na classe Datamapper)
				if ($tratar_null && is_null($value) && isset($data[$this->id_field])){
					$this->{$field} = __NULL__;
				}
				else {
					//Retirando Espaços no cadastro
					$value 			= is_null($value) ? NULL : preg_replace('/[ ]{2,}/', ' ', $value);
					$this->{$field} = is_null($value) ? NULL : trim($value);
				}
			}
		}
		
		//persiste dados no campo
		return $this->save();
	}
}


