<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
/* employee*/

	public  function get_all_employees(){
		$this->db->select('*')->from('customers');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}

}