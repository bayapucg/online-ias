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
		$this->db->select('v_id,type,title,topic,teacher,video,org_video,status,created_at')->from('videos');
		$this->db->where('v_id',$id);
		return $this->db->get()->row_array();
	}
	public  function get_video_list($id){
		$this->db->select('v_id,type,title,topic,teacher,video,org_video,status,created_at')->from('videos');
		$this->db->where('created_by',$id);
		$this->db->where('status !=',2);
		return $this->db->get()->result_array();
	}
	public  function get_active_video_list(){
		$this->db->select('v_id,title,type,topic,teacher,video,org_video,status,created_at')->from('videos');
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

}