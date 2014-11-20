<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CodeIgniter Inflector Helpers
 *
 * Customised singular and plural helpers.
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team, stensi
 * @link		http://codeigniter.com/user_guide/helpers/directory_helper.html
 */

// --------------------------------------------------------------------

/**
* Singular
*
* Takes a plural word and makes it singular (improved by stensi)
*
* @access	public
* @param	string
* @return	str
*/
if ( ! function_exists('verifica_acesso')){
	
	function verifica_acesso($id, $inicio = false){

		if(empty($id) || $id == '{id_ent}' && $inicio){
			$config['url_retorno'] = '/';
			 redirect("/");
		}
		else{
			 	redirect("inicio","refresh");
		}

		return true;
	}
}

/* End of file inflector_helper.php */
/* Location: ./application/helpers/inflector_helper.php */