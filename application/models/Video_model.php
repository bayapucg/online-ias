<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save($d){
		$this->db->insert('videos',$d);
        return $this->db->insert_id();
	}
	
	public  function get_video_details($id){
		$this->db->select('v_id,type,title,topic,teacher,video,org_video,status,created_at,ptype')->from('videos');
		$this->db->where('v_id',$id);
		return $this->db->get()->row_array();
	}
	public  function get_video_list($id){
		$this->db->select('v_id,type,title,topic,teacher,video,org_video,status,created_at,ptype')->from('videos');
		$this->db->where('created_by',$id);
		$this->db->where('status !=',2);
		return $this->db->get()->result_array();
	}
	public  function get_active_video_list(){
		$this->db->select('v_id,title,type,topic,teacher,video,org_video,status,created_at,ptype')->from('videos');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}	
	public  function update($id,$d){
		$this->db->where('v_id',$id);
		return $this->db->update('videos',$d);
	}
	public  function video_delete($id){
		$this->db->where('v_id',$id);
		return $this->db->delete('videos');
	}
/* employee*/

	public  function get_all_employees(){
		$this->db->select('*')->from('customers');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public  function get_payment_list(){
		$this->db->select('*')->from('payments');		
		$this->db->where('status',1);
        return $this->db->get()->result_array();
	}
	public  function save_send_msgs($d){
		$this->db->insert('chat_msgs', $d);
		return $insert_id = $this->db->insert_id();
	}
	public  function get_video_chat_details_list($vid){
		$this->db->select('cm.c_m_id,cm.v_c_id,cm.m_text,cm.type,cm.created_at,cs.name as c_name,a.name as ad_name,cs.p_pic,a.profile_pic')->from('chat_msgs as cm');
		$this->db->join('customers as cs','cs.c_id=cm.created_by AND cm.type="Reply"','left');	
		$this->db->join('admin as a','a.id=cm.created_by AND cm.type="Replyed"','left');
		$this->db->where('cm.v_id',$vid);
		return $this->db->get()->result_array();
	}

}