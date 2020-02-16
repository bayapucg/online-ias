<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_user($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	public  function check_email_mobile($e,$m){
		$sql = "SELECT c_id,email,mobile FROM customers WHERE (email ='".$e."' AND  status !=2)";
		return $this->db->query($sql)->row_array();
	}	
	public  function get_basic_customer_data($id){
		$this->db->select('c.c_id,c.user_login,c.role,c.email')->from('customers as c');
		$this->db->join('roles as r','r.r_id=c.role','left');
		$this->db->where('c.c_id',$id);
		return $this->db->get()->row_array();
	}	
	public function check_login($u,$p){
		$sql = "SELECT c_id,email FROM customers WHERE (email ='".$u."' AND  pwd ='".md5($p)."' AND  status =1) OR (mobile ='".$u."' AND pwd ='".md5($p)."' AND  status =1)";
		return $this->db->query($sql)->row_array();
	}	
	public  function get_customer_data($id){
		$this->db->select('c.c_id,c.user_login,c.role,c.email,c.name,r.rname,c.mobile,c.address,c.p_pic')->from('customers as c');
		$this->db->join('roles as r','r.r_id=c.role','left');
		$this->db->where('c.c_id',$id);
		return $this->db->get()->row_array();
	}
	public  function get_customer_pwddata($id){
		$this->db->select('c.c_id,c.pwd,c.org_pwd')->from('customers as c');
		$this->db->where('c.c_id',$id);
		return $this->db->get()->row_array();
	}
	public  function update_user_d($id,$d){
		$this->db->where('c_id',$id);
		return $this->db->update('customers',$d);
	}
	public  function check_email_exits($email){
		$this->db->select('c.c_id,c.name,c.email,c.pwd,c.org_pwd')->from('customers as c');
		$this->db->where('c.email',$email);
		return $this->db->get()->row_array();
	}
	public  function get_payment_user_list($id){
		$this->db->select('p.title,p.description,pd.total_amt,pd.paid_amt,pd.coupon_code,pd.created_at')->from('payment_details as pd');
		$this->db->join('payments as p','p.p_id=pd.p_id','left');		
		$this->db->where('pd.c_id',$id);		
        return $this->db->get()->result_array();	
	}
	
}