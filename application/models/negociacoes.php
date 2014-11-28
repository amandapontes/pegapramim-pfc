<?php

/**
 * Template DataMapper Model
 *
 * Use this basic model as a template for creating new models.
 * It is not recommended that you include this file with your application,
 * especially if you use a Template library (as the classes may collide).
 *
 * To use:
 * 1) Copy this file to the lowercase name of your new model.
 * 2) Find-and-replace (case-sensitive) 'Template' with 'Your_model'
 * 3) Find-and-replace (case-sensitive) 'template' with 'your_model'
 * 4) Find-and-replace (case-sensitive) 'templates' with 'your_models'
 * 5) Edit the file as desired.
 *
 * @license		MIT License
 * @category	Models
 * @author		Phil DeJarnett
 * @link		http://www.overzealous.com
 */
class Negociacoes extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	// var $model = 'template';
	 var $table = 'negociacoes';

	// You can override the database connections with this option
	// var $db_params = 'db_config_name';

	// --------------------------------------------------------------------
	// Relationships
	//   Configure your relationships below
	// --------------------------------------------------------------------

	// Insert related models that Template can have just one of.
	//var $has_one = array('enderecos_temp','veiculos_temp');

	// Insert related models that Template can have more than one of.
	//var $has_many = array();

	/* Relationship Examples
	 * For normal relationships, simply add the model name to the array:
	 *   $has_one = array('user'); // Template has one User
	 *
	 * For complex relationships, such as having a Creator and Editor for
	 * Template, use this form:
	 *   $has_one = array(
	 *   	'creator' => array(
	 *   		'class' => 'user',
	 *   		'other_field' => 'created_template'
	 *   	)
	 *   );
	 *
	 * Don't forget to add 'created_template' to User, with class set to
	 * 'template', and the other_field set to 'creator'!
	 *
	 */

	// --------------------------------------------------------------------
	// Validation
	//   Add validation requirements, such as 'required', for your fields.
	// --------------------------------------------------------------------

/*	var $validation = array(
		'example' => array(
			// example is required, and cannot be more than 120 characters long.
			'rules' => array('required', 'max_length' => 120),
			'label' => 'Example'
		)
	);*/

	// --------------------------------------------------------------------
	// Default Ordering
	//   Uncomment this to always sort by 'name', then by
	//   id descending (unless overridden)
	// --------------------------------------------------------------------

	// var $default_order_by = array('name', 'id' => 'desc');

	// --------------------------------------------------------------------

	/**
	 * Constructor: calls parent constructor
	 */
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }

	// --------------------------------------------------------------------
	// Post Model Initialisation
	//   Add your own custom initialisation code to the Model
	// The parameter indicates if the current config was loaded from cache or not
	// --------------------------------------------------------------------
	/* function post_model_init($from_cache = FALSE)
	{
	}
*/
	// --------------------------------------------------------------------
	// Custom Methods
	//   Add your own custom methods here to enhance the model.
	// --------------------------------------------------------------------

	/* Example Custom Method
	function get_open_templates()
	{
		return $this->where('status <>', 'closed')->get();
	}
	*/

	// --------------------------------------------------------------------
	// Custom Validation Rules
	//   Add custom validation rules for this model here.
	// --------------------------------------------------------------------

	/* Example Rule
	function _convert_written_numbers($field, $parameter)
	{
	 	$nums = array('one' => 1, 'two' => 2, 'three' => 3);
	 	if(in_array($this->{$field}, $nums))
		{
			$this->{$field} = $nums[$this->{$field}];
	 	}
	}
	*/
	
	public function salvar($_data, $add_msg = true){
		$ln =  new Lista_Negociacoes();
		$existe = $this->verificar_existe($_data['id_pro']);
		#echo "<print>"; print_r(); echo "</pre>";die;
		#echo $existe->exists();
		if(!$existe->exists()){
			#echo "NAO existe";
			$this->dt_criacao_nego         		 = date("Y-m-d H:i:s");
			$this->id_pro      		 			 = $_data['id_pro'];
			$this->save();
			$_data['id_nego'] 					 = $this->id_nego;;
		}
	#	echo "existe";
		if($add_msg){
			return $ln->add_mensagem_negociao($_data);
		}
		return $this;
	}
	public function verificar_existe($id_pro){
		return $this->where('id_pro',$id_pro)->get();
	}

public function getById($id_nego){
		return $this->where('id_nego',$id_nego)->get();
	}

	public function getAll(){
		return $this->get();
	}


public function getNegociaesByIdProposta($id, $aprovado = "-1"){
		/*$this->get();
		$e = new Entidade();
		return $e->where_related($this->get());*/
		if($aprovado == "-1"){
			return $this->db->query("select * from encomendas JOIN propostas on propostas.id_enc = encomendas.id_enc JOIN entidades on propostas.id_ent_motoboy = entidades.id_ent where encomendas.id_ent = ". $id .";")->result();	
		}
		return $this->db->query("select * from encomendas JOIN propostas on propostas.id_enc = encomendas.id_enc JOIN entidades on propostas.id_ent_motoboy = entidades.id_ent where encomendas.id_ent = ". $id ." and aprovado_pro =". $aprovado ." ;")->result();
		//return $this->db->get()->result();
	}
}
/* End of file template.php */
/* Location: ./application/models/template.php */
