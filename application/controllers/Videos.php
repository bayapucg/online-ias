<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
class Videos extends Frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Home_model');		
		
	}
	public function index()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$check=$this->Home_model->check_payment_details($cd['c_id']);
				if(count($check)){
					$data['b_list']=$this->Home_model->get_banners_list();
					//echo '<pre>';print_r($check);exit;
					$this->load->view('html/all-saved-videos');
					$this->load->view('html/footer');
					$this->load->view('html/footer-links');
				}else{
					redirect('payment');
				}
				
		}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	
}
