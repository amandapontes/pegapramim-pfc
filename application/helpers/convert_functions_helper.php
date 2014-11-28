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
if ( ! function_exists('converte_status')){
	
	function converte_status($status){

		switch ($status) {
			case 'F':
				return "Finalizado";
				break;
			case 'C':
				return "Cancelado";
				break;
			default:
				return "Normal";
				break;
		}
	}
}

if ( ! function_exists('converte_status_color')){
	
	function converte_status_color($status){

		switch ($status) {
			case 'F':
				return "success";
				break;
			case 'C':
				return "danger";
				break;
			default:
				return "info";
				break;
		}
	}
}

if ( ! function_exists('enviar_email')){
	
	function enviar_email(){
		$ci = &get_instance();
		$ci->load->library('email');

		$ci->email->from('lhenrique@gattecnologia.com.br', 'PegaPraMim');
		$ci->email->to('luketevl@g,gmail.com'); 

		$ci->email->subject('Email Test');
		$ci->email->message('Testing the email class.');	

		$ci->email->send();

		echo $ci->email->print_debugger();
	}
}
/* End of file inflector_helper.php */
/* Location: ./application/helpers/inflector_helper.php */