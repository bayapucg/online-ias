<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Sidebar.php');

class Dashboard extends sidebar {
	public function __construct() 
	{
		parent::__construct();
	}
	public function index()
	{	
		if($this->session->userdata('sai_f'))
		{
				$l_d=$this->session->userdata('sai_f');
				$this->load->view('admin/dashboard');	
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
		}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('admin');
			}
	}	
	public  function logout(){
		
		$userinfo = $this->session->userdata('sai_f');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('sai_f');
		$this->session->unset_userdata('sai_f');
        redirect('admin');
	}
}
