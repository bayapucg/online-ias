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
	public  function get_menu_list(){
		$this->db->select('m_id,m_name')->from('modules');		
		$this->db->where('m_status', 1);
        $return=$this->db->get()->result_array();
		foreach($return as $li){
			$menu=$this->get_submenu_list($li['m_id']);
			$data[$li['m_id']]=$li;
			$data[$li['m_id']]['menu']=$menu;
		}
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_submenu_list($id){
		$this->db->select('m_m_id,m_menu_name,m_menu_url')->from('modules_menu');		
		$this->db->where('m_name',$id);
		$this->db->where('status', 1);
        return $this->db->get()->result_array();
	}
	
	public  function get_user_menu_list($a_id){
		$this->db->select('urp.m_id,m.m_name')->from('user_role_privileges as urp');
		$this->db->join('modules as m','m.m_id=urp.m_id','left');
		$this->db->where('urp.u_id',$a_id);
		$this->db->group_by('urp.m_id');
		$return=$this->db->get()->result_array();
		foreach($return as $li){
			$menu=$this->get_user_submenu_list($li['m_id'],$a_id);
			$data[$li['m_id']]=$li;
			$data[$li['m_id']]['menu']=$menu;
		}
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_user_submenu_list($id,$a_id){
		$this->db->select('m.m_menu_name,m.m_menu_url')->from('user_role_privileges as urp');
		$this->db->join('modules_menu as m','m.m_m_id=urp.m_m_id','left');
		$this->db->where('urp.u_id',$a_id);
		$this->db->where('m.m_name',$id);
		$this->db->order_by('m.m_m_id','asc');
        return $this->db->get()->result_array();
	}
	
	public  function update_h_details($a_id,$data){
		$this->db->where('h_id',$a_id);
    	return $this->db->update("hospital_details",$data);
	}
	public  function get_hospital_details($id){
		$this->db->select('h_id,name,website,email,mobile,address,logo')->from('hospital_details');
		$this->db->where('h_id',$id);
    	return $this->db->get()->row_array();
	}
	
	// dashboard 
	
	public  function get_ip_cnt(){
		$this->db->select('count(i_p_id) as cnt')->from('ip_patients');
    	return $this->db->get()->row_array();
	}
	public  function get_med_list(){
		$this->db->select('count(med_id) as cnt')->from('medicines');
		$this->db->where('status',1);
    	return $this->db->get()->row_array();
	}public  function get_patients_list(){
		$this->db->select('count(p_id) as cnt')->from('patients');
		$this->db->where('status',1);
    	return $this->db->get()->row_array();
	}public  function get_op_list(){
		$this->db->select('count(o_p_id) as cnt')->from('op_patients');
		$this->db->where('status',1);
    	return $this->db->get()->row_array();
	}
	
	
  }