<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend extends CI_Controller {

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
		$this->load->model('Home_model');
		$this->load->model('User_model');
		$this->load->view('html/header-links');
			if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$cus_d['cdata']=$this->User_model->get_customer_data($cd['c_id']);
				$this->load->view('html/header',$cus_d);
			}else{
				
				$this->load->view('html/header');
			}
			
	}
	
}
