<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
class Profile extends Frontend {

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
				$data['cdata']=$this->User_model->get_customer_data($cd['c_id']);
				$this->load->view('html/profile',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function edit()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$data['cdata']=$this->User_model->get_customer_data($cd['c_id']);
				$this->load->view('html/profile-edit',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function editpost()
	{	
		if($this->session->userdata('rs_d'))
			{
				$post=$this->input->post();
				$cd=$this->session->userdata('rs_d');
				$cdata=$this->User_model->get_customer_data($cd['c_id']);
				//echo '<pre>';print_r($cdata);
				if($post['email']!=$cdata['email'] || $post['mobile']!=$cdata['mobile']){
					$check=$this->User_model->check_email_mobile($post['email'],$post['mobile']);
					//echo $this->db->last_query();exit;
					if(count($check)>0){
						if($check['email']==$post['email'] && $check['mobile']==$post['mobile']){
							$this->session->set_flashdata('error',"Email and Mobile already used. Please use another one");
						}else if($check['email']==$post['email']){
							$this->session->set_flashdata('error',"Email already used. Please use another one");
						}else if($check['mobile']==$post['mobile']){
							$this->session->set_flashdata('error',"Mobile already used. Please use another one");
						}
						redirect('profile/edit');
					}
				}
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/profile_pic/'.$cdata['p_pic']);
							$temp = explode(".", $_FILES["image"]["name"]);
							$image = round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['image']['tmp_name'], "assets/profile_pic/" . $image);
						}else{
							$image=$cdata['p_pic'];
						}
				$ud=array(
				'name'=>isset($post['name'])?$post['name']:'',
				'email'=>isset($post['email'])?$post['email']:'',
				'mobile'=>isset($post['mobile'])?$post['mobile']:'',
				'address'=>isset($post['address'])?$post['address']:'',
				'p_pic'=>isset($image)?$image:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->User_model->update_user_d($cd['c_id'],$ud);
				if(count($update)>0){
					$this->session->set_flashdata('success',"Profile updated successfully");
					redirect('profile');
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('profile/edit');
				}
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function changepassword()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$data['cdata']=$this->User_model->get_customer_data($cd['c_id']);
				$this->load->view('html/change-password',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function pwdpost()
	{	
		if($this->session->userdata('rs_d'))
			{
				$post=$this->input->post();
				$cd=$this->session->userdata('rs_d');
				$cdata=$this->User_model->get_customer_pwddata($cd['c_id']);
					//echo '<pre>';print_r($cdata);exit;
					if(($cdata['pwd'])== md5($post['oldpassword'])){
						if(md5($post['password'])== md5($post['confirmpassword'])){
							$ud=array(
							'pwd'=>isset($post['confirmpassword'])?md5($post['confirmpassword']):'',
							'org_pwd'=>isset($post['confirmpassword'])?$post['confirmpassword']:'',
							'updated_at'=>date('Y-m-d H:i:s'),
							);
							$update=$this->User_model->update_user_d($cd['c_id'],$ud);
							if(count($update)>0){
								$this->session->set_flashdata('success',"password successfully updated");
								redirect('profile');
							}else{
								$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
								redirect('profile/changepassword');
							}
						}else{
							$this->session->set_flashdata('error',"Password and Confirm password are not matched");
							redirect('profile/changepassword');
						}
				}else{
					$this->session->set_flashdata('error',"Old password are not matched");
					redirect('profile/changepassword');
				}
				//echo '<pre>';print_r($post);exit;
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	
}
