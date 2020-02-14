<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
class Home extends Frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Home_model');		
		
	}
	public function index()
	{	
		$data['b_list']=$this->Home_model->get_banners_list();
		$data['dem_video']=$this->Home_model->get_demo_videos_list();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/index',$data);
		$this->load->view('html/footer');
		$this->load->view('html/footer-links');
	}
	
}
