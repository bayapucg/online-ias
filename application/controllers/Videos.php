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
					$v_pay_id=$this->Home_model->get_videso_payment_list($cd['c_id']);
					if(isset($v_pay_id) && count($v_pay_id)>0){
						foreach($v_pay_id as $vli){
							$all_video_list=$this->Home_model->get_user_videos_list($vli['p_id']);
							$data[$vli['p_id']]=$vli;
							$data[$vli['p_id']]['video_list']=$all_video_list;
						}
						$data['video_list']=$data;
					}else{
						$data['video_list']=array();
					}
					//echo '<pre>';print_r($data);exit;
					$this->load->view('html/all-saved-videos',$data);
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
	public function clarification()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$this->load->view('html/clarification');
				$this->load->view('html/footer');
				$this->load->view('html/footer-links');
				
				
		}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	
}
