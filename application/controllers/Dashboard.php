<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
class Dashboard extends Frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('User_model');		
		
	}
	public function index()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				if($cd['role']==1){
					$this->load->view('html/dashboard');
				}else if($cd['role']==2){ 
					redirect('profile');
				}else if($cd['role']==3 || $cd['role']==4){ 
					$this->load->view('html/dashboard');
				}
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function customer()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$this->load->view('html/cusomer-dashboard');
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	
	public  function logout(){
		$cd=$this->session->userdata('rs_d');
		$ud=array('user_login'=>0,'updated_at'=>date('Y-m-d H:i:s'));
		$update=$this->User_model->update_user_d($cd['c_id'],$ud);
		$userinfo = $this->session->userdata('rs_d');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('rs_d');
		$this->session->unset_userdata('rs_d');
        redirect('user');
	}
	
}
