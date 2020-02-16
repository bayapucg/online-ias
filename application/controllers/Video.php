<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Sidebar.php');

class Video extends sidebar {
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Video_model');		
	}
	public function index()
	{	
		if($this->session->userdata('sai_f'))
			{
				$l_data=$this->session->userdata('sai_f');
				//echo '<pre>';print_r($l_data);exit;
				$data['v_list']=$this->Video_model->get_video_list($l_data['id']);	
				$this->load->view('video/list',$data);
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('admin');
			}
	}
	public function edit()
	{	
		if($this->session->userdata('sai_f'))
			{
				$l_data=$this->session->userdata('sai_f');
				$cid=base64_decode($this->uri->segment(3));				
				$data['v_d']=$this->Video_model->get_video_details($cid);
				$data['p_t_list']=$this->Video_model->get_payment_list();					
				//echo '<pre>';print_r($data);exit;
				$this->load->view('video/edit',$data);
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('admin');
			}
	}
	public function assign()
	{	
		if($this->session->userdata('sai_f'))
			{
				$l_data=$this->session->userdata('sai_f');
				$cid=base64_decode($this->uri->segment(3));				
				$data['v_d']=$this->Video_model->get_video_details($cid);	
				$data['all_emp']=$this->Video_model->get_all_employees();	
				//echo '<pre>';print_r($data);exit;
				$this->load->view('video/assign',$data);
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('admin');
			}
	}
	public function add()
	{	
		if($this->session->userdata('sai_f'))
			{
				$l_data=$this->session->userdata('sai_f');
				$data['p_t_list']=$this->Video_model->get_payment_list();
				$this->load->view('video/add',$data);
				$this->load->view('admin/footer');
				$this->load->view('admin/footer-links');
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('admin');
			}
	}
	
		public  function addpost(){
		if($this->session->userdata('sai_f'))
			{
				$l_data=$this->session->userdata('sai_f');
				$post=$this->input->post();
				if(isset($_FILES['video']['name']) && $_FILES['video']['name']!=''){
					$temp = explode(".", $_FILES["video"]["name"]);
					$video = round(microtime(true)) . '.' . end($temp);
					$org_video=$_FILES['video']['name'];
					move_uploaded_file($_FILES['video']['tmp_name'], "assets/video/" . $video);
				}				
				$ad=array(
					'ptype'=>isset($post['ptype'])?$post['ptype']:'',
					'type'=>isset($post['type'])?$post['type']:'',
					'title'=>isset($post['title'])?$post['title']:'',
					'topic'=>isset($post['topic'])?$post['topic']:'',
					'teacher'=>isset($post['teacher'])?$post['teacher']:'',
					'video'=>isset($video)?$video:'',
					'org_video'=>isset($org_video)?$org_video:'',
					'created_at'=>date('Y-m-d H:i:s'),
					'created_by'=>isset($l_data['id'])?$l_data['id']:'',
					);
				$save=$this->Video_model->save($ad);
				if(count($save)>0){
					$this->session->set_flashdata('success',"Video successfully added");
					redirect('video/index');
				}else{
					$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
					redirect('video/add');	
				}
				
			}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('admin');
			}
	}
	public  function editpost(){
		if($this->session->userdata('sai_f'))
		{
			$l_data=$this->session->userdata('sai_f');
			$post=$this->input->post();
			$s_d=$this->Video_model->get_video_details($post['v_id']);	
				if(isset($_FILES['video']['name']) && $_FILES['video']['name']!=''){
					unlink('assets/video/'.$s_d['video']);
					$temp = explode(".", $_FILES["video"]["name"]);
					$video = round(microtime(true)) . '.' . end($temp);
					$org_video=$_FILES['video']['name'];
					move_uploaded_file($_FILES['video']['tmp_name'], "assets/video/" . $video);
				}else{
					$video=$s_d['video'];
					$org_video=$s_d['org_video'];
				}
			$ud=array(
				'ptype'=>isset($post['ptype'])?$post['ptype']:'',
				'title'=>isset($post['title'])?$post['title']:'',
				'type'=>isset($post['type'])?$post['type']:'',
				'topic'=>isset($post['topic'])?$post['topic']:'',
				'teacher'=>isset($post['teacher'])?$post['teacher']:'',
				'video'=>isset($video)?$video:'',
				'org_video'=>isset($org_video)?$org_video:'',
				'updated_at'=>date('Y-m-d H:i:s')
			);
			$update=$this->Video_model->update($post['v_id'],$ud);
			if(count($update)>0){
					$this->session->set_flashdata('success',"Subject updated successfully");
					redirect('video/index');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
				redirect('video/edit/'.base64_encode($post['v_id']));
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
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
			$update=$this->Video_model->update($d_id,$u_data);
			if(count($update)>0){
				if($st==1){
					$this->session->set_flashdata('success',"Video activated successfully");
				}else{
					$this->session->set_flashdata('success',"Video deactivated successfully");
				}
				redirect('video');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
				redirect('video');
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
			$v_details=$this->Video_model->get_video_details($d_id);
			$update=$this->Video_model->video_delete($d_id);
			if(count($update)>0){
				unlink('assets/video/'.$v_details['video']);
				$this->session->set_flashdata('success',"video deleted successfully");
				redirect('video');
			}else{
				$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
				redirect('video');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	
	
	
	
}
