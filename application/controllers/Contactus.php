<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
class Contactus extends Frontend {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{	
		$this->load->view('html/contactus');
		$this->load->view('html/footer');
		$this->load->view('html/footer-links');
	}
	public  function post(){
		
		
		$post=$this->input->post();
		
		$addcontact=array(
		'name'=>isset($post['name'])?$post['name']:'',
		'mobile'=>isset($post['mobile'])?$post['mobile']:'',
		'subject'=>isset($post['subject'])?$post['subject']:'',
		'email'=>isset($post['email'])?$post['email']:'',
		'msg'=>isset($post['msg'])?$post['msg']:'',
		'created_at'=>date('Y-m-d H:i:s'),
		);
		
		//echo '<pre>';print_r($post);exit;
		
		$save=$this->Home_model->save_contactus($addcontact);
		if(count($save)>0){
				$data['details']=$post;
				$this->load->library('email');
				$this->load->library('email');
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
				$this->email->from($post['email']);
				$this->email->to('info@onlineiasacademy.com');
				$this->email->subject('Contact us - Request  '.$post['subject']);
				//$body = $this->load->view('email/contactus.php',$data,true);
				//$html = $this->load->view('email/orderconfirmation.php', $data, true); 

				$msg='Name:'.$post['name'].' <br> Email :'.$post['email'].'<br> Mobile  number :'.$post['mobile'].'<br> Message :'.$post['msg'];
				$this->email->message($msg);
				//echo $body;exit;
				$this->email->send();
				
				//echo "test";exit;
				$this->session->set_flashdata('success',"Your message was successfully sent.");
				redirect('home');
			}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('home');
			}
		//echo '<pre>';print_r($post);exit;
		
	}
	
}
