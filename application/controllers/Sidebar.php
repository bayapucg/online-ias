<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->library('encryption');	
		$this->load->model('Admin_model');
		$e_key=$this->config->item('encryption_key');
		$this->load->view('admin/header-links');
			if($this->session->userdata('sai_f'))
			{
				$l_data=$this->session->userdata('sai_f');
				$data['u_d']=$this->Admin_model->get_user_details($l_data['id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/header',$data);
			}else{
				$data['u_d']=array();
				$this->load->view('admin/header',$data);
			}
	}
	
}
