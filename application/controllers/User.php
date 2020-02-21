<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

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
		$this->load->model('User_model');
		$this->load->view('html/header-links');
	}
	
	public function index()
	{	
		if(!$this->session->userdata('rs_d'))
			{
				$this->load->view('html/login');
				$this->load->view('html/footer-links');
		}else{
				redirect('profile');
		}
	}
	public function registration()
	{	
		if(!$this->session->userdata('rs_d'))
			{
				$this->load->view('html/signup');
				$this->load->view('html/footer-links');
		}else{
				redirect('profile');
		}
	}
	public function forgotpassword()
	{	
		if(!$this->session->userdata('rs_d'))
			{
				$this->load->view('html/forgot_pass');
				$this->load->view('html/footer-links');
		}else{
				redirect('profile');
		}
	}
	public function signuppost()
	{	
		if(!$this->session->userdata('rs_d'))
			{
				$post=$this->input->post();
				$check=$this->User_model->check_email_mobile($post['email'],$post['mobile']);
				if(count($check)>0){
					if($check['email']==$post['email'] && $check['mobile']==$post['mobile']){
						$this->session->set_flashdata('error',"Email and Mobile already used. Please use another one");
					}else if($check['email']==$post['email']){
						$this->session->set_flashdata('error',"Email already used. Please use another one");
					}else if($check['mobile']==$post['mobile']){
						$this->session->set_flashdata('error',"Mobile already used. Please use another one");
					}
					redirect('user');
				}
				$ad=array(
				'role'=>isset($post['role'])?$post['role']:'',
				'name'=>isset($post['name'])?$post['name']:'',
				'email'=>isset($post['email'])?$post['email']:'',
				'mobile'=>isset($post['mobile'])?$post['mobile']:'',
				'pwd'=>isset($post['pwd'])?md5($post['pwd']):'',
				'org_pwd'=>isset($post['pwd'])?($post['pwd']):'',
				'created_at'=>date('Y-m-d H:i:s'),
				);
				$save=$this->User_model->save_user($ad);
				if(count($save)>0){
					$c_d=$this->User_model->get_basic_customer_data($save);
					//echo '<pre>';print_r($c_d);exit;
					$this->session->set_userdata('rs_d',$c_d);
					$this->session->set_flashdata('success',"Registered successfully");
					redirect('profile');
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('user');
				}
				//echo '<pre>';print_r($post);exit;
		}else{
				redirect('profile');
		}
	}	
	public  function loginpost(){
			if(!$this->session->userdata('rs_d'))
			{
				$post=$this->input->post();
				$l_check=$this->User_model->check_login($post['uname'],$post['pwd']);
				if(count($l_check)>0){
					$c_d=$this->User_model->get_basic_customer_data($l_check['c_id']);
					if($c_d['user_login']==1){
						$this->session->set_flashdata('error',"You are already logged in on a different device. Please wait for a few minutes, and try again");
						redirect('user');
					}
					//echo '<pre>';print_r($c_d);exit;
					$ud=array('user_login'=>0,'updated_at'=>date('Y-m-d H:i:s'));
					$update=$this->User_model->update_user_d($cd['c_id'],$ud);
					$this->session->set_userdata('rs_d',$c_d);
					redirect('profile');
				}else{
					$this->session->set_flashdata('error',"Invalid login details. Please try again");
					redirect('user');
				}
			}else{
				redirect('profile');
			}
	}
	public function forgotpost(){
		$post=$this->input->post();
		$check_email=$this->User_model->check_email_exits($post['email']);
			if(count($check_email)>0){
				
				$data['details']=$check_email;
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->to($check_email['email']);
				$this->email->from('info@onlineiasacademy.com');
				$this->email->subject('forgot - password');
				$body = $this->load->view('email/forgot',$data,TRUE);
				//echo $body;exit;
				$this->email->message($body);
				$this->email->send();
				$this->session->set_flashdata('success','Check Your Email to reset your password!');
				redirect('user');

			}else{
				$this->session->set_flashdata('error','The email you entered is not a registered email. Please try again. ');
				redirect('user');	
			}
		
	}
	
}
