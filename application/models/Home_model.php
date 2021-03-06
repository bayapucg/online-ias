<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_contactus($data){
		$this->db->insert('contactus', $data);
		return $insert_id = $this->db->insert_id();
	}
	public  function get_banners_list(){
		$this->db->select('b_id,title,subtitle,image,org_image,')->from('home_banners');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public  function get_demo_videos_list(){
		$this->db->select('v_id,title,topic,teacher,video,org_video')->from('videos');
		$this->db->where('type','demo');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public  function get_online_videos(){
		$this->db->select('v_id,title,topic,teacher,video,org_video')->from('videos');
		$this->db->where('type','Live');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public  function get_testimonials_list(){
		$this->db->select('t.name,t.message,t.image')->from('testimonials as t');
		$this->db->where('t.status',1);
        return $this->db->get()->result_array();
	}
	/* payment check */ 
	public  function check_payment_details($id){
		$this->db->select('p_d_id,p_id,c_id')->from('payment_details');
		$this->db->where('c_id',$id);
		return $this->db->get()->row_array();
	}
	
	public  function get_videso_payment_list($id){		
		$this->db->select('pd.p_id')->from('payment_details as pd');
		$this->db->join('payments as p','p.p_id=pd.p_id','left');		
		$this->db->where('pd.c_id',$id);
        return $this->db->get()->result_array();
	}
	
	public  function get_user_videos_list($pid){
		$this->db->select('v_id,title,topic,teacher,video,org_video')->from('videos');
		$this->db->where('type','Live');
		$this->db->where('ptype',$pid);
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public  function get_video_details($vid){
		$this->db->select('v_id,title,topic,teacher,video,org_video')->from('videos');
		$this->db->where('v_id',$vid);
		return $this->db->get()->row_array();
	}
	public  function save_send_msgs($d){
		$this->db->insert('chat_msgs', $d);
		return $insert_id = $this->db->insert_id();
	}
	public  function get_videos_chat_lists($cid,$vid){
		$this->db->select('cm.c_m_id,cm.v_c_id,cm.m_text,cm.type,cm.created_at,cs.name as c_name,a.name as ad_name')->from('chat_msgs as cm');
		$this->db->join('customers as cs','cs.c_id=cm.created_by AND cm.type="Reply"','left');	
		$this->db->join('admin as a','a.id=cm.created_by AND cm.type="Replyed"','left');
		$this->db->where('cm.v_c_id',$cid);
		$this->db->where('cm.v_id',$vid);
		return $this->db->get()->result_array();
	}
	
	
	
}