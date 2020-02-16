<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function login_details($data){
		$sql = "SELECT * FROM admin WHERE email ='".$data['email']."' AND pwd='".$data['pwd']."' AND status=1";
		return $this->db->query($sql)->row_array();	
	}
	public function get_hospital_city(){
		$this->db->select('city')->from('hospital');
		$this->db->group_by('city');
		$this->db->where('status',1);
		return $this->db->get()->result_array();	
	}
	public  function get_hos_list(){
		$this->db->select('h.h_id,h.name')->from('hospital as h');
		$this->db->where('h.status',1);
		return $this->db->get()->result_array();		
	}
	public function get_adminpassword_details($admin_id){
		$this->db->select('admin.pwd')->from('admin');		
		$this->db->where('id', $admin_id);
        return $this->db->get()->row_array();	
	}
	public function get_admin_details($admin_id){
		$this->db->select('admin.id,admin.role,admin.email,admin.mobile')->from('admin');		
		$this->db->where('id', $admin_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	
	}
	public function update_admin_details($a_id,$data){
		$this->db->where('id',$a_id);
    	return $this->db->update("admin",$data);
	}
	public function check_email_exits($email){
		$this->db->select('admin.id,admin.email,admin.org_password')->from('admin');		
		$this->db->where('email', $email);
		$this->db->where('status !=',2);
        return $this->db->get()->row_array();	
	}
	public  function get_user_details($a_id){
		$this->db->select('*')->from('admin as a');		
		$this->db->where('a.id',$a_id);
        return $this->db->get()->row_array();	
	}
	public  function get_register_user_list(){
		$this->db->select('c_id,name,email,mobile,address,created_at')->from('customers as c');		
		$this->db->where('c.status',1);
        return $this->db->get()->result_array();	
	}
	
	public  function get_payment_user_list(){
		$this->db->select('c.name,c.email,c.mobile,p.title,p.description,pd.total_amt,pd.paid_amt,pd.coupon_code,pd.created_at')->from('payment_details as pd');
		$this->db->join('payments as p','p.p_id=pd.p_id','left');		
		$this->db->join('customers as c','c.c_id=pd.c_id','left');		
        return $this->db->get()->result_array();	
	}
	
	
	// dashboard 
	
	
  }