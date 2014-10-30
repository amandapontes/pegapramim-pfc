<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			$e = new Entidade();
		#echo "<pre>"; print_r($e); echo "</pre>";die;

		$dados 							= (array)$e->stored;
		/*$dados['nome_ent'] 				='';
		$dados['login_ent'] 			='';
		$dados['cpf_cnpj_ent'] 			='';
*/
		$dados['descricao_cont_tel'] 	='';
		$dados['descricao_cont_cel'] 	='';
 		$this->parser->parse('login',$dados); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */