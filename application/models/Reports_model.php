<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_reports($d){
		$this->db->insert('reports', $d);
		return $insert_id = $this->db->insert_id();
	}
	public function save_reports_files($d){
		$this->db->insert('report_files', $d);
		return $insert_id = $this->db->insert_id();
	}
	
	public  function get_up_report_list($id){
		$this->db->select('r.r_id,r.name,r.mobile,r.email,r.claim_type,r.full_address,r.remarks,r.created_at,cus.name as created_by,cust.name as updated_by')->from('reports as r');
		$this->db->join('customers as cus','cus.c_id=r.created_by','left');
		$this->db->join('customers as cust','cust.c_id=r.updated_by','left');
		$this->db->where('r.c_id',$id);
		return $this->db->get()->result_array();
	}
	public  function update_user_d($id,$d){
		$this->db->where('c_id',$id);
		return $this->db->update('customers',$d);
	}
	
	public  function get_all_up_report_list(){
		$this->db->select('r.r_id,r.name,r.mobile,r.email,r.claim_type,r.full_address,r.remarks,r.created_at,cus.name as created_by,cust.name as updated_by')->from('reports as r');
		$this->db->join('customers as cus','cus.c_id=r.created_by','left');
		$this->db->join('customers as cust','cust.c_id=r.updated_by','left');
		$this->db->where('r.status',1);
		return $this->db->get()->result_array();
	}	
	public function get_up_report_details($id){
		$this->db->select('r_f_id,c_id,name,file_name')->from('report_files as rf');
		$this->db->where('rf.r_id',$id);
		$this->db->where('rf.status',1);
		return $this->db->get()->result_array();
	}
	public function save_report_comments($d){
		$this->db->insert('report_comments', $d);
		return $insert_id = $this->db->insert_id();
	}
	public  function get_dctor_list(){
		$this->db->select('cus.c_id,cus.name,')->from('customers as cus');
		$this->db->where('cus.role',3);
		$this->db->where('cus.status',1);
		return $this->db->get()->result_array();
	}
	public  function get_advocate_list(){
		$this->db->select('cus.c_id,cus.name,')->from('customers as cus');
		$this->db->where('cus.role',4);
		$this->db->where('cus.status',1);
		return $this->db->get()->result_array();
	}
	
	/*reupload reports */
	public function save_reuploadreports($d){
		$this->db->insert('reuplod_reports', $d);
		return $insert_id = $this->db->insert_id();
	}
	public function save_reupload_reports_files($d){
		$this->db->insert('reupload_report_files', $d);
		return $insert_id = $this->db->insert_id();
	}
	
	public function get_reupload_report_list(){
		$this->db->select('r.r_u_id,r.doct_id,r.advocate_id,r.name,r.claim_type,r.full_address,r.remarks,r.created_at,cus.name as doct_name,cust.name as advoct_name')->from('reuplod_reports as r');
		$this->db->join('customers as cus','cus.c_id=r.doct_id','left');
		$this->db->join('customers as cust','cust.c_id=r.advocate_id','left');
		$this->db->where('r.status',1);
		return $this->db->get()->result_array();
	}
	
	public function get_reupload_report_view_list($id){
		$this->db->select('rpf.re_u_f_id,rpf.r_u_id,rpf.name,rpf.file_name')->from('reupload_report_files as rpf');
		$this->db->where('rpf.r_u_id',$id);
		$this->db->where('rpf.status',1);
		return $this->db->get()->result_array();
	}	
	/* save comment*/
	public  function save_reupload_comment($d){
		$this->db->insert('reupload_report_comment', $d);
		return $insert_id = $this->db->insert_id();
	}
	
	public  function get_img_details($id){
		$this->db->select('rpf.re_u_f_id,rpf.r_u_id,rpf.name,rpf.file_name')->from('reupload_report_files as rpf');
		$this->db->where('rpf.re_u_f_id',$id);
		return $this->db->get()->row_array();
	}
	public  function remove_imgs($id){
		$this->db->where('re_u_f_id',$id);
		return $this->db->delete('reupload_report_files');		
	}
	public function get_re_up_re_remarks_list(){
		$this->db->select('rrc.type,rrc.comment,rrc.created_at,cus.name')->from('reupload_report_comment as rrc');
		$this->db->join('customers as cus','cus.c_id=rrc.created_by','left');
		return $this->db->get()->result_array();
	}
	/* upload comment */
	public function save_upload_comment($d){
		$this->db->insert('upload_report_comment', $d);
		return $insert_id = $this->db->insert_id();
	}	
	public function get_up_re_remarks_list(){
		$this->db->select('rrc.type,rrc.comment,rrc.created_at,cus.name')->from('upload_report_comment as rrc');
		$this->db->join('customers as cus','cus.c_id=rrc.created_by','left');
		return $this->db->get()->result_array();
	}
	public  function get_cus_img_details($id){
		$this->db->select('rpf.r_f_id,rpf.name,rpf.file_name')->from('report_files as rpf');
		$this->db->where('rpf.r_f_id',$id);
		return $this->db->get()->row_array();
	}
	public  function remove_cus_imgs($id){
		$this->db->where('r_f_id',$id);
		return $this->db->delete('report_files');		
	}
	

	
}