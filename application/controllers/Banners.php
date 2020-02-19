<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Sidebar.php');

class Banners extends Sidebar {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Banners_model');
	}
	public function index()
	{	
		if($this->session->userdata('sai_f'))
		{
			$this->load->view('home_banners/add');
			$this->load->view('admin/footer');
			$this->load->view('admin/footer-links');
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function lists()
	{	
		if($this->session->userdata('sai_f'))
		{
			$admindetails=$this->session->userdata('sai_f');
			$data['banners_list']=$this->Banners_model->get_banners_list($admindetails['id']);
			
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('home_banners/list',$data);
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
			$admindetails=$this->session->userdata('sai_f');
			$f_id=base64_decode($this->uri->segment(3));
			$data['details']=$this->Banners_model->get_banners_details($f_id);
			
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('home_banners/edit',$data);
			$this->load->view('admin/footer');
			$this->load->view('admin/footer-links');
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function addpost()
	{	
		if($this->session->userdata('sai_f'))
		{
			$admindetails=$this->session->userdata('sai_f');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
						if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/home_banners/" . $image);
							}else{
								$image='';
							}
					$add_data=array(
					'subtitle'=>isset($post['subtitle'])?$post['subtitle']:'',
					'title'=>isset($post['title'])?$post['title']:'',
					'image'=>$image,
					'org_image'=>isset($_FILES['image']['name'])?$_FILES['image']['name']:'',
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'update_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['id'],
					);
					$save=$this->Banners_model->save_banners($add_data);
						if(count($save)>0){
							$this->session->set_flashdata('success','Home Banner successfully Added');
							redirect('banners/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('banners');
						}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function editpost()
	{	
		if($this->session->userdata('sai_f'))
		{
			$admindetails=$this->session->userdata('sai_f');
			$post=$this->input->post();
					$details=$this->Banners_model->get_banners_details($post['b_id']);
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/home_banners/'.$details['image']);

								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/home_banners/" . $image);
								$org_name=$_FILES["image"]["name"];
							}else{
								$image=$details['image'];
								$org_name=$details['org_image'];
							}
					$update_data=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'subtitle'=>isset($post['subtitle'])?$post['subtitle']:'',

					'image'=>$image,
					'org_image'=>$org_name,
					'update_at'=>date('Y-m-d H:i:s'),
					);
						$update=$this->Banners_model->update_banners_details($post['b_id'],$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success','Home Banner successfully Updated');
							redirect('banners/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('banners');
						}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function status()
	{	
		if($this->session->userdata('sai_f'))
		{
			$admindetails=$this->session->userdata('sai_f');
			$post=$this->input->post();
			$f_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			if($status==1){
				$stat=0;
			}else{
				$stat=1;
			}
			$update_data=array(
					'status'=>$stat,
					'update_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Banners_model->update_banners_details($f_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success','Home Banner successfully deactivated');
							}else{
							$this->session->set_flashdata('success','Home Banner successfully activated');
							}
							redirect('banners/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('banners/lists');
						}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function delete()
	{	
		if($this->session->userdata('sai_f'))
		{
			$admindetails=$this->session->userdata('sai_f');
			$post=$this->input->post();
			$f_id=base64_decode($this->uri->segment(3));
			$details=$this->Banners_model->get_banners_details($f_id);
			
					$delete=$this->Banners_model->delete_banners($f_id);
					if(count($delete)>0){
						unlink('assets/home_banners/'.$details['image']);
						$this->session->set_flashdata('success','Home Banner successfully deleted');
						redirect('banners/lists');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('banners/lists');
					}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	
	
	
}
