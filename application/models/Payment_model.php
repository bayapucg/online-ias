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
	public function save_payments($d){
		$this->db->insert('payments',$d);
		return $insert_id = $this->db->insert_id();
	}
	public  function get_payments_lists($id){
		$this->db->select('*')->from('payments');		
		$this->db->where('created_by',$id);
		$this->db->where('status !=',2);
        return $this->db->get()->result_array();
	}
	public  function get_payment_details($id){
		$this->db->select('*')->from('payments');		
		$this->db->where('p_id',$id);
        return $this->db->get()->row_array();
	}
	public function update_payments($id,$d){
		$this->db->where('p_id',$id);
    	return $this->db->update("payments",$d);
	}
	
	/* users list */
	public  function get_active_payment_list(){
		$this->db->select('*')->from('payments');		
		$this->db->where('status',1);
        return $this->db->get()->result_array();
	}

}