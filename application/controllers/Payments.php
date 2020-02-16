<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Sidebar.php');
class Payments extends Sidebar{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('User_model');		
		$this->load->model('Payment_model');		
		
	}
	public function index()
	{	
		if($this->session->userdata('sai_f'))
			{
				$cd=$this->session->userdata('sai_f');
				$data['pay_l']=$this->Payment_model->get_payments_lists($cd['id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('payments/list',$data);
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('admin');
			}
	}
	public function add()
	{	
		if($this->session->userdata('sai_f'))
			{
				$cd=$this->session->userdata('sai_f');
				$this->load->view('payments/add');
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('admin');
			}
	}public function edit()
	{	
		if($this->session->userdata('sai_f'))
			{
				$cd=$this->session->userdata('sai_f');
				$p_id=base64_decode($this->uri->segment(3));
				$data['p_de']=$this->Payment_model->get_payment_details($p_id);
				$this->load->view('payments/edit',$data);
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('admin');
			}
	}
	
	public function addpost()
	{	
		if($this->session->userdata('sai_f'))
			{
				$cd=$this->session->userdata('sai_f');
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$a=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'description'=>isset($post['description'])?$post['description']:'',
					'amt'=>isset($post['amt'])?$post['amt']:'',
					'promo'=>isset($post['promo'])?$post['promo']:'',
					'promo_amt'=>isset($post['promo_amt'])?$post['promo_amt']:'',					
					'created_at'=>date('Y-m-d h:i:s'),
					'created_by'=>isset($cd['id'])?$cd['id']:'',
				);
				$save=$this->Payment_model->save_payments($a);
				if(count($save)>0){
					$this->session->set_flashdata('success',"Payment added successfully");
					redirect('payments/index');
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('payments/add');
				}
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('admin');
			}
	}
	public function editpost()
	{	
		if($this->session->userdata('sai_f'))
			{
				$cd=$this->session->userdata('sai_f');
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$ud=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'description'=>isset($post['description'])?$post['description']:'',
					'amt'=>isset($post['amt'])?$post['amt']:'',
					'promo'=>isset($post['promo'])?$post['promo']:'',
					'promo_amt'=>isset($post['promo_amt'])?$post['promo_amt']:'',					
					'updated_at'=>date('Y-m-d h:i:s'),
				);
				$update=$this->Payment_model->update_payments($post['p_id'],$ud);
				if(count($update)>0){
					$this->session->set_flashdata('success',"Payment updated successfully");
					redirect('payments/index');
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('payments/edit/'.base64_encode($post['p_id']));
				}
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('admin');
			}
	}
	public  function status(){
		if($this->session->userdata('sai_f'))
		{
			$d_id=base64_decode($this->uri->segment(3));
			$statu=base64_decode($this->uri->segment(4));
			if($statu==1){
				$st=0;	
			}else{
				$st=1;
			}
			$u_data=array(
			'status'=>$st,
			'updated_at'=>date('Y-m-d H:i:s')
			);
			$update=$this->Payment_model->update_payments($d_id,$u_data);
			if(count($update)>0){
				if($st==1){
					$this->session->set_flashdata('success',"Payment activated successfully");
				}else{
					$this->session->set_flashdata('success',"Payment deactivated successfully");
				}
				redirect('payments/index');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
				redirect('payments/index');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public  function delete(){
		if($this->session->userdata('sai_f'))
		{
			$d_id=base64_decode($this->uri->segment(3));
			$u_data=array(
			'status'=>2,
			'updated_at'=>date('Y-m-d H:i:s')
			);
			$update=$this->Payment_model->update_payments($d_id,$u_data);
			if(count($update)>0){
				$this->session->set_flashdata('success',"Payment deleted successfully");
				redirect('payments/index');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
				redirect('payments/index');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	
	
	
	
}
