<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
class Reports extends Frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('User_model');		
		$this->load->model('Reports_model');		
		
	}
	public function index()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$data['report_l']=$this->Reports_model->get_up_report_list($cd['c_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('html/reports-list',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function all()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$data['report_l']=$this->Reports_model->get_all_up_report_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('html/reports-all-list',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function upload()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$this->load->view('html/upload-reports');
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function view()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$rid=base64_decode($this->uri->segment(3));
				if($rid==''){
					$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
					redirect('reports/all');
				}
				$data['r_id']=$rid;
				$data['rep_details']=$this->Reports_model->get_up_report_details($rid);
				$data['up_re_remarks']=$this->Reports_model->get_up_re_remarks_list($rid);
				//echo '<pre>';print_r($data['up_re_remarks']);exit;
				$this->load->view('html/view-reports',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function uploadpost()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$post=$this->input->post();
				$a=array(
					'c_id'=>isset($cd['c_id'])?$cd['c_id']:'',
					'name'=>isset($post['name'])?$post['name']:'',
					'mobile'=>isset($post['mobile'])?$post['mobile']:'',
					'email'=>isset($post['email'])?$post['email']:'',
					'claim_type'=>isset($post['claim_type'])?$post['claim_type']:'',
					'full_address'=>isset($post['full_address'])?$post['full_address']:'',
					'remarks'=>isset($post['remarks'])?$post['remarks']:'',
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>isset($cd['c_id'])?$cd['c_id']:'',
				);
				$save=$this->Reports_model->save_reports($a);
				if(count($save)>0){
					$cnt=0;foreach($_FILES['image_file']['name'] as $lis){
						if($_FILES['image_file']['tmp_name'][$cnt]!=''){
							$temp = explode(".", $_FILES["image_file"]["name"][$cnt]);
							$img =$cnt.round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['image_file']['tmp_name'][$cnt], "assets/reports/" . $img);
							$add=array(
							'r_id'=>isset($save)?$save:'',
							'c_id'=>isset($cd['c_id'])?$cd['c_id']:'',
							'file_name'=>isset($img)?$img:'',
							'name'=>isset($post["report_name"][$cnt])?$post["report_name"][$cnt]:'',
							'created_at'=>date('Y-m-d H:i:s'),
							'created_by'=>isset($cd['c_id'])?$cd['c_id']:''
							);
							$this->Reports_model->save_reports_files($add);
						}
					$cnt++;}
					$this->session->set_flashdata('success',"Reports added successfully");
					redirect('reports/index');
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('reports/upload');
				}
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	/*reupload post */
	
	public function reupload()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$data['doct_list']=$this->Reports_model->get_dctor_list();
				$data['advocate_list']=$this->Reports_model->get_advocate_list();
				$this->load->view('html/reupload-reports',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function reuploadlist()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$data['re_up_list']=$this->Reports_model->get_reupload_report_list();
				$this->load->view('html/reupload-reports-list',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function reuploadpost()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$a=array(
					'doct_id'=>isset($post['doct_id'])?$post['doct_id']:'',
					'advocate_id'=>isset($post['advocate_id'])?$post['advocate_id']:'',
					'name'=>isset($post['name'])?$post['name']:'',
					'claim_type'=>isset($post['claim_type'])?$post['claim_type']:'',
					'full_address'=>isset($post['full_address'])?$post['full_address']:'',
					'remarks'=>isset($post['remarks'])?$post['remarks']:'',
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>isset($cd['c_id'])?$cd['c_id']:'',
				);
				$save=$this->Reports_model->save_reuploadreports($a);
				if(count($save)>0){
					$cnt=0;foreach($_FILES['image_file']['name'] as $lis){
						if($_FILES['image_file']['tmp_name'][$cnt]!=''){
							$temp = explode(".", $_FILES["image_file"]["name"][$cnt]);
							$img =$cnt.round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['image_file']['tmp_name'][$cnt], "assets/reuploadreports/" . $img);
							$add=array(
							'r_u_id'=>isset($save)?$save:'',
							'file_name'=>isset($img)?$img:'',
							'name'=>isset($post["report_name"][$cnt])?$post["report_name"][$cnt]:'',
							'created_at'=>date('Y-m-d H:i:s'),
							'created_by'=>isset($cd['c_id'])?$cd['c_id']:''
							);
							$this->Reports_model->save_reupload_reports_files($add);
						}
					$cnt++;}
					$this->session->set_flashdata('success',"Reports added successfully");
					redirect('reports/reuploadlist');
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('reports/reupload');
				}
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function reuploadview()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$data['cdata']=$this->User_model->get_customer_data($cd['c_id']);
				//echo '<pre>';print_r($data);exit;
				$rpid=base64_decode($this->uri->segment(3));
				if($rpid==''){
					$this->session->set_flashdata('error',"Technical problem will occurred. Please try again");
					redirect('reports/reuploadlist');
				}
				$data['r_u_id']=$rpid;
				$data['re_up_re_list']=$this->Reports_model->get_reupload_report_view_list($rpid);
				$data['re_up_re_remarks']=$this->Reports_model->get_re_up_re_remarks_list($rpid);
				//echo '<pre>';print_r($data['re_up_re_remarks']);exit;
				$this->load->view('html/reupload-reports-view',$data);
				$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function reuploadcomment()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$post=$this->input->post();
				$ac=array(
					'type'=>isset($post["type"])?$post["type"]:'',
					'r_u_id'=>isset($post["r_u_id"])?$post["r_u_id"]:'',
					'comment'=>isset($post["comment"])?$post["comment"]:'',
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>isset($cd['c_id'])?$cd['c_id']:''
				);
				$save=$this->Reports_model->save_reupload_comment($ac);
				if(count($save)>0){
					$this->session->set_flashdata('success',"Comment sent successfully");
					redirect('reports/reuploadview/'.base64_encode($post["r_u_id"]));
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('reports/reuploadview/'.base64_encode($post["r_u_id"]));
				}
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function reupload_image()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$cnt=0;foreach($_FILES['image_file']['name'] as $lis){
						if($_FILES['image_file']['tmp_name'][$cnt]!=''){
							$temp = explode(".", $_FILES["image_file"]["name"][$cnt]);
							$img =$cnt.round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['image_file']['tmp_name'][$cnt], "assets/reuploadreports/" . $img);
							$add=array(
							'r_u_id'=>isset($post['r_u_id'])?$post['r_u_id']:'',
							'file_name'=>isset($img)?$img:'',
							'name'=>isset($post["report_name"][$cnt])?$post["report_name"][$cnt]:'',
							'created_at'=>date('Y-m-d H:i:s'),
							'created_by'=>isset($cd['c_id'])?$cd['c_id']:''
							);
							$this->Reports_model->save_reupload_reports_files($add);
						}
					$cnt++;}
					$this->session->set_flashdata('success',"Reports added successfully");
					redirect('reports/reuploadview/'.base64_encode($post['r_u_id']));
				
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function remove_imgs(){
		if($this->session->userdata('rs_d'))
		{
				$post = $this->input->post();
				$img_d=$this->Reports_model->get_img_details($post['re_u_f_id']);
				$remove=$this->Reports_model->remove_imgs($post['re_u_f_id']);
				if(count($remove) > 0)
				{
					unlink('assets/reuploadreports/'.$img_d['file_name']);
					$data['msg']=1;
					echo json_encode($data);exit;	
				}
		}else{
			$this->session->set_flashdata('error',"Please log in or sign up to continue");
			redirect('user');
		}
	}
	public function uploadcomment()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$post=$this->input->post();
				$ac=array(
					'type'=>isset($post["type"])?$post["type"]:'',
					'r_id'=>isset($post["r_id"])?$post["r_id"]:'',
					'comment'=>isset($post["comment"])?$post["comment"]:'',
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>isset($cd['c_id'])?$cd['c_id']:''
				);
				$save=$this->Reports_model->save_upload_comment($ac);
				if(count($save)>0){
					$this->session->set_flashdata('success',"Comment sent successfully");
					redirect('reports/view/'.base64_encode($post["r_id"]));
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('reports/view/'.base64_encode($post["r_id"]));
				}
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function upload_image()
	{	
		if($this->session->userdata('rs_d'))
			{
				$cd=$this->session->userdata('rs_d');
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$cnt=0;foreach($_FILES['image_file']['name'] as $lis){
						if($_FILES['image_file']['tmp_name'][$cnt]!=''){
							$temp = explode(".", $_FILES["image_file"]["name"][$cnt]);
							$img =$cnt.round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['image_file']['tmp_name'][$cnt], "assets/reports/" . $img);
							$add=array(
							'r_id'=>isset($post['r_id'])?$post['r_id']:'',
							'file_name'=>isset($img)?$img:'',
							'name'=>isset($post["report_name"][$cnt])?$post["report_name"][$cnt]:'',
							'created_at'=>date('Y-m-d H:i:s'),
							'created_by'=>isset($cd['c_id'])?$cd['c_id']:''
							);
							$this->Reports_model->save_reports_files($add);
						}
					$cnt++;}
					$this->session->set_flashdata('success',"Reports added successfully");
					redirect('reports/view/'.base64_encode($post['r_id']));
				
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function remove_upimgs(){
		if($this->session->userdata('rs_d'))
		{
				$post = $this->input->post();
				$img_d=$this->Reports_model->get_cus_img_details($post['r_f_id']);
				$remove=$this->Reports_model->remove_cus_imgs($post['r_f_id']);
				if(count($remove) > 0)
				{
					unlink('assets/reports/'.$img_d['file_name']);
					$data['msg']=1;
					echo json_encode($data);exit;	
				}
		}else{
			$this->session->set_flashdata('error',"Please log in or sign up to continue");
			redirect('user');
		}
	}
	
	
}
