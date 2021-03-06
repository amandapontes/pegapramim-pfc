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
class Lista_Negociacoes extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	// var $model = 'template';
	 var $table = 'lista_negociacoes';

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
	
	public function add_mensagem_negociao($_data){
		//$e = new Entidade();
		//echo "<pre>"; print_r($_data); "</pre>";
		//$n->dt_criacao = 		date("Y-m-d H:i:s");
		$this->dt_criacao_lista_nego = date("Y-m-d H:i:s");
		//$this->id_pro         = $_data['id_opc'];
		$this->id_nego 				 = $_data['id_nego'];
		$this->id_ent_enviou 		 = $_data['id_ent_enviou'];
		$this->msg_lista_nego        = $_data['msg_lista_nego'];
		return $this->save();
		//echo "<print>"; print_r($e->id); echo "</pre>";
	}
	public function salvar($_data){
		//$e = new Entidade();
//		echo "<pre>"; print_r(				array_merge((array)$n->stored, $_data)); "</pre>";
		//$n->dt_criacao = 		date("Y-m-d H:i:s");
		//$e->id_ent       = $_data['id_ent'];
		$existe = $this->verificar_existe($_data['login_ent']);
		#echo "<print>"; print_r(); echo "</pre>";die;
		if(empty($existe->stored->id_ent)){
			$this->ativo        = $_data['ativo'];
			$this->nome_ent     = $_data['nome_ent'];
			$this->login_ent    = $_data['login_ent'];
			$this->senha_ent    = $_data['senha_ent'];
			return $this->save();
		}
		return $existe;
		//echo "<print>"; print_r($e->id); echo "</pre>";
	}

	public function verificar_existe($login){
		return $this->where('login_ent',$login)->get();
	}

	public function getAllNego($id_pro){
			return $this->db->query("select log.* , en.* , pro.id_pro, pro.status_pro FROM propostas pro left join negociacoes nego on nego.id_pro = pro.id_pro left join lista_negociacoes log on log.id_nego = nego.id_nego
left JOIN entidades en on log.id_ent_enviou = en.id_ent where pro.id_pro = ". $id_pro ." order by log.id_lista_nego;")->result();	
	}
}
/* End of file template.php */
/* Location: ./application/models/template.php */
