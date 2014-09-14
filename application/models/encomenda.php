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
class Encomenda extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	// var $model = 'template';
	// var $table = 'templates';

	// You can override the database connections with this option
	// var $db_params = 'db_config_name';

	// --------------------------------------------------------------------
	// Relationships
	//   Configure your relationships below
	// --------------------------------------------------------------------

	// Insert related models that Template can have just one of.
	var $has_one = array('enderecos_temp','veiculos_temp');

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
	public function salvar($_data){
		//$e = new Entidade();
		//echo "<pre>"; print_r($_data); "</pre>";
		//$n->dt_criacao = 		date("Y-m-d H:i:s");
		//$this->id_enc            = $_data['id_enc'];
		$this->longitude_cli     = $_data['longitude_cli'];
		$this->latitude_cli      = $_data['latitude_cli'];
		$this->longitude_enco    = $_data['txtLongitude'];
		$this->latitude_enco     = $_data['txtLatitude'];
		$this->dt_criacao_enco   = date('Y-m-d h:m:i');
		$this->id_ent          	 = $_data['id_ent'];
		$this->id_ent_motoboy    = 0;
		return $this->save();
		//echo "<print>"; print_r($e->id); echo "</pre>";
	}

	public function getEncomendas(){
		/*$this->get();
		$e = new Entidade();
		return $e->where_related($this->get());*/
		return $this->db->query('select encomendas.* , entidades.* , contatos.* from entidades join encomendas on encomendas.id_ent = entidades.id_ent left join propostas on propostas.id_enc = encomendas.id_enc left join contatos on contatos.id_ent = entidades.id_ent group by contatos.id_ent;')->result();
		//return $this->db->get()->result();
	}

	public function getEncomendasById($id){
		/*$this->get();
		$e = new Entidade();
		return $e->where_related($this->get());*/
		return $this->db->query("select encomendas.*, entidades.*, contatos.* FROM entidades JOIN encomendas ON encomendas.id_ent = entidades.id_ent LEFT JOIN propostas ON propostas.id_enc = encomendas.id_enc LEFT JOIN contatos ON contatos.id_ent = entidades.id_ent where propostas.id_enc IS NULL or propostas.id_ent_motoboy !=" . $id ." GROUP BY encomendas.id_enc;")->result();
		//return $this->db->get()->result();
	}

}
/* End of file template.php */
/* Location: ./application/models/template.php */
