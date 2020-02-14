<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banners_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_banners($data){
		$this->db->insert('home_banners', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_banners_list($id){
		$this->db->select('*')->from('home_banners');		
		$this->db->where('home_banners.create_by',$id);
        return $this->db->get()->result_array();	
	}
	public function get_banners_details($id){
		$this->db->select('*')->from('home_banners');		
		$this->db->where('b_id',$id);
        return $this->db->get()->row_array();	
	}
	public function update_banners_details($id,$data){
		$this->db->where('b_id',$id);
    	return $this->db->update("home_banners",$data);
	}
	public function delete_banners($id){
		$this->db->where('b_id', $id);
		return $this->db->delete('home_banners');
	}
	

}