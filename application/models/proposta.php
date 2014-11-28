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
class Proposta extends DataMapper {

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
	public function salvar($_data){
		//$e = new Entidade();
		echo "<pre>"; print_r($_data); "</pre>";
		//$n->dt_criacao = 		date("Y-m-d H:i:s");
		$this->dt_criacao_pro = date("Y-m-d H:i:s");
		//$this->id_pro         = $_data['id_opc'];
		$this->id_ent_motoboy = $_data['id_ent_motoboy'];
		$this->id_enc         = $_data['id_enc'];
		$this->vr_pro         = $_data['vr_pro'];
		$this->status_pro     = 'N';
		$this->aprovado_pro   = '0';
		return $this->save();
		//echo "<print>"; print_r($e->id); echo "</pre>";
	}

	public function getAll(){
		return $this->get();
	}

	public function getByStatus($status){
		return $this->where('aprovado_pro', $status)->get();
	}


public function getPropostasByIdUsuario($id, $aprovado = "-1"){
		/*$this->get();
		$e = new Entidade();
		return $e->where_related($this->get());*/
		if($aprovado == "-1"){
			return $this->db->query("select * from encomendas JOIN propostas on propostas.id_enc = encomendas.id_enc JOIN entidades on propostas.id_ent_motoboy = entidades.id_ent where encomendas.id_ent = ". $id .";")->result();	
		}
		return $this->db->query("select * from encomendas JOIN propostas on propostas.id_enc = encomendas.id_enc JOIN entidades on propostas.id_ent_motoboy = entidades.id_ent where encomendas.id_ent = ". $id ." and aprovado_pro =". $aprovado ." ;")->result();
		//return $this->db->get()->result();
	}

public function getPropostasByIdUsuarioFeito($id){
		/*$this->get();
		$e = new Entidade();
		return $e->where_related($this->get());*/
		return $this->db->query("select * from encomendas JOIN propostas on propostas.id_enc = encomendas.id_enc JOIN entidades on propostas.id_ent_motoboy = entidades.id_ent where propostas.id_ent_motoboy = ". $id ." group by encomendas.id_enc;")->result();
		//return $this->db->get()->result();
	}

public function deletar($id){
		/*$this->get();
		return $e->where_related($this->get());*/
			return $this->db->query("delete from propostas where id_pro = ". $id ." ;");
		//return $p->where('id_pro', $id)->get()->delete();
				//return $this->db->get()->result();
	}

	public function deletarIdEncomenda($id){
		
		/*$this->get();
		return $e->where_related($this->get());*/
		return $this->db->query("delete from propostas where id_enc = ". $id ." ;");
				//return $this->db->get()->result();
	}

	public function verifica_vinculo($id){
		return $this->where('id_pro',$id)->count_all_results();
	}


	public function atualizar_aprovado($id, $status){
		$p = new Proposta();
		return $p->where('id_pro',$id)->update(array('aprovado_pro' => $status ));
	}
	public function atualizar_status($id, $status){
		$p = new Proposta();
		return $p->where('id_pro',$id)->update(array('status_pro' => $status ));
	}
}
/* End of file template.php */
/* Location: ./application/models/template.php */
