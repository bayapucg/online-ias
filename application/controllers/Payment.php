<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
require_once ('razorpay-php/Razorpay.php');
use Razorpay\Api\Api as RazorpayApi;
class Payment extends Frontend {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->model('Payment_model');
		//https://github.com/razorpay/razorpay-php
		}
	public function index()
	{
		//$api = new RazorpayApi('your_api_key_here', 'your_api_secret_here');
		$api_id= $this->config->item('keyId');
		$api_Secret= $this->config->item('API_keySecret');
		$api = new RazorpayApi($api_id,$api_Secret);
		echo '<pre>';print_r($api);exit;
		//$api = new RazorpayApi($this->config->load('keyId'), $this->config->load('API_keySecret'));
		$orderData = [
				'receipt'         => 3456,
				'amount'          => 20 * 100, // 2000 rupees in paise
				'currency'        => 'INR',
				'payment_capture' => 1 // auto capture
		];

	$razorpayOrder = $api->order->create($orderData);
	$razorpayOrderId = $razorpayOrder['id'];
	$displayAmount = $amount = $orderData['amount'];
	$refund = $api->refund->create(array('payment_id' => $razorpayOrderId));
	$displayCurrency=$orderData['currency'];
	$data['details'] = [
						"key"               => $api_id,
						"amount"            => $amount,
						"name"              => "vasudevareddy",
						"description"       => "Activate for cloud account",
						"image"             => "",
						"prefill"           => [
						"name"              => "vasudevareddy reddem",
						"email"             => "vasudevareddy@prachatech.com",
						"contact"           => "8500050944",
						],
						"notes"             => [
						"address"           => "kukatpalli",
						"merchant_order_id" => "12312321",
						],
						"theme"             => [
						"color"             => "#F37254"
						],
						"order_id"          => $razorpayOrderId,
						"display_currency"          => $orderData['currency'],
		];
		
			$this->load->view('payment/pay',$data);
	}
	
	public  function success(){
		if($this->session->userdata('userdetails'))
		{
			$userdetails=$this->session->userdata('userdetails');
			$data['userdetails'] = $this->Employee_model->get_employee_details($userdetails['emp_id']);
			if($data['userdetails']['role']==4 || $data['userdetails']['role']==1){
					$post=$this->input->post();
							$data['billing_details']=$this->Employee_model->get_billing_details($post['b_id']);
							$path = rtrim(FCPATH,"/");
							$file_name =$data['billing_details']['project'].'_'.$data['billing_details']['b_id'].'.pdf';
							$pdfFilePath = $path."/assets/invoices/".$file_name;
							ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
							$html =$this->load->view('payment/invoice',$data, true); // render the view into HTML
							
							//echo '<pre>';print_r($html);exit;
							$this->load->library('pdf');
							$pdf = $this->pdf->load();
							$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
							$pdf->SetDisplayMode('fullpage');
							$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
							$pdf->WriteHTML($html); // write the HTML into the PDF
							$pdf->Output($pdfFilePath, 'F');
							$update_data=array(
							'invoice_name'=>$file_name,
							'payment_id'=>isset($post['razorpay_payment_id'])?$post['razorpay_payment_id']:'',
							'payment_order_id'=>isset($post['razorpay_order_id'])?$post['razorpay_order_id']:'',
							'payment_singnature'=>isset($post['razorpay_signature'])?$post['razorpay_signature']:'',
							'staus'=>1,
							);
							$this->Employee_model->update_project_bills($post['b_id'],$update_data);
							$this->email->set_newline("\r\n");
							$this->email->from('sales@prachatech.com');
							$this->email->to($data['billing_details']['email_id']);
							$this->email->subject($data['billing_details']['project'].' Inovice');
							$this->email->message('Please find out below attachment');
							$this->email->attach($pdfFilePath);
							$this->email->send();
							//echo $this->db->last_query();exit;
							redirect('payment/bill_list');
			}else{
			redirect('employee');
			}
			
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('employee');
		}
		
	}
	public  function refund(){
		
		$api_id= $this->config->item('keyId');
		$api_Secret= $this->config->item('API_keySecret');	
		$api = new RazorpayApi($api_id, $api_Secret);
		$payment = $api->payment->fetch('pay_9jcdNamZ0Rj5zJ');
		$refund = $payment->refund();
		//$refund = $payment->refund(array('amount' => 100)); 
		echo '<pre>';print_r($refund);exit;
		
	}
	public  function capture(){
		
		$api_id= $this->config->item('keyId');
		$api_Secret= $this->config->item('API_keySecret');	
		$api = new RazorpayApi($api_id, $api_Secret);
		$payment = $api->payment->fetch('pay_9jcdNamZ0Rj5zJ');
		$capture=$payment->capture();
		//$refund = $payment->refund(array('amount' => 100)); 
		//echo '<pre>';print_r($capture);exit;
		
	}
	public function billing(){
		if($this->session->userdata('userdetails'))
		{
			$userdetails=$this->session->userdata('userdetails');
			$data['userdetails'] = $this->Employee_model->get_employee_details($userdetails['emp_id']);
			if($data['userdetails']['role']==4 || $data['userdetails']['role']==1 || $data['userdetails']['role']==2){
				$bill_id=base64_decode($this->uri->segment(3));
				if(isset($bill_id) && $bill_id!=''){
				$data['bill_details'] = $this->Employee_model->get_billing_details($bill_id);
				}else{
				$data['bill_details']=array();	
				}
				$this->load->view('header1');
				$this->load->view('sidebar',$data);
				$this->load->view('payment/addbill',$data);
				//$this->load->view('footer');
			}else{
			redirect('employee');
			}
			
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('employee');
		}
	}
	public function bill_list(){
		if($this->session->userdata('userdetails'))
		{
			$userdetails=$this->session->userdata('userdetails');
			$data['userdetails'] = $this->Employee_model->get_employee_details($userdetails['emp_id']);
			if($data['userdetails']['role']==4 || $data['userdetails']['role']==2 || $data['userdetails']['role']==1){
				$this->load->view('header1');
				if($data['userdetails']['role']==4){
				$data['bill_list'] = $this->Employee_model->get_invoice_list($userdetails['emp_id']);
				}else{
					$data['bill_list'] = $this->Employee_model->get_all_invoice_list();
				}
				$this->load->view('sidebar',$data);
				$this->load->view('invoice_list',$data);
				//$this->load->view('footer');
			}else{
			redirect('employee');
			}
			
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('employee');
		}
	}
	public function paypayment(){
		if($this->session->userdata('userdetails'))
		{
			$userdetails=$this->session->userdata('userdetails');
			$data['userdetails'] = $this->Employee_model->get_employee_details($userdetails['emp_id']);
			if($data['userdetails']['role']==4 || $data['userdetails']['role']==1){
				$bill_id=base64_decode($this->uri->segment(3));
				$bill_details = $this->Employee_model->get_billing_details($bill_id);
				$data['bill_details'] = $bill_details;
				$data['bill_details']['key'] = $this->config->item('keyId');
				//echo '<pre>';print_r($bill_details);
				/* online  payment mode purpose*/
					$api_id= $this->config->item('keyId');
					$api_Secret= $this->config->item('API_keySecret');
					$api = new RazorpayApi($api_id,$api_Secret);
					$orderData = [
						'receipt'         => $bill_details['b_id'],
						'amount'          => $bill_details['pay'], // 2000 rupees in paise
						'currency'        => 'INR',
						'payment_capture' => 1 // auto capture
					];
					$razorpayOrder = $api->order->create($orderData);
					$razorpayOrderId = $razorpayOrder['id'];
					$displayAmount = $amount = $orderData['amount'];
					$displayCurrency=$orderData['currency'];
					$data['details'] = [
							"key"               => $api_id,
							"amount"            => $amount,
							"name"              => $bill_details['name'],
							"description"       => $bill_details['project'].', '.$bill_details['others'],
							"image"             => "",
							"prefill"           => [
							"name"              => $bill_details['name'],
							"email"             => $bill_details['email_id'],
							"contact"           => $bill_details['mobile_no'],
							],
							"notes"             => [
							"address"           => $bill_details['adress'],
							"merchant_order_id" => "",
							],
							"theme"             => [
							"color"             => "#F37254"
							],
							"order_id"          => $razorpayOrderId,
							"display_currency"          => $orderData['currency'],
						];
					$this->load->view('header1');
					$this->load->view('payment/pay',$data);
				
				//echo "<pre>";print_r($data);exit;
			}else{
			redirect('employee');
			}
			
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('employee');
		}
	}
	public function addpayment(){
		if($this->session->userdata('userdetails'))
		{
			$userdetails=$this->session->userdata('userdetails');
			$data['userdetails'] = $this->Employee_model->get_employee_details($userdetails['emp_id']);
			if($data['userdetails']['role']==1 || $data['userdetails']['role']==4){
				$post=$this->input->post();
				//echo "<pre>";print_r($userdetails);exit;
				$add=array(
				'name'=>isset($post['name'])?$post['name']:'',
				'email_id'=>isset($post['email'])?$post['email']:'',
				'adress'=>isset($post['adress'])?$post['adress']:'',
				'mobile_no'=>isset($post['mobile'])?$post['mobile']:'',
				'alter_mobile_no'=>isset($post['altermobile'])?$post['altermobile']:'',
				'project'=>isset($post['project'])?$post['project']:'',
				'amount'=>isset($post['amount'])?$post['amount']:'',
				'pay'=>isset($post['amount_pay'])?$post['amount_pay']:'',
				'due'=>isset($post['amount_due'])?$post['amount_due']:'',
				'others'=>isset($post['others'])?$post['others']:'',
				'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
				'create_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$userdetails['emp_id'],
				);
				if(isset($post['b_id']) && $post['b_id']!=''){
					$biil_save=$this->Employee_model->update_project_bills($post['b_id'],$add);
				}else{
				$biil_save=$this->Employee_model->save_project_bills($add);
				}
				if(count($biil_save)>0){
					$this->session->set_flashdata('success','Your invoice successfully generated');
					//redirect('payment/suggestion');
					if(isset($post['payment_type']) && $post['payment_type']==1){
						if($post['b_id']!=''){
							redirect('payment/paypayment/'.base64_encode($post['b_id']));
						}else{
							redirect('payment/paypayment/'.base64_encode($biil_save));	
						}
					}else{
						
							$data['billing_details']=$this->Employee_model->get_billing_details($biil_save);
							$path = rtrim(FCPATH,"/");
							$file_name =$data['billing_details']['project'].'_'.$biil_save.'.pdf';
							$pdfFilePath = $path."/assets/invoices/".$file_name;
							ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
							$html =$this->load->view('payment/invoice',$data, true); // render the view into HTML
							
							//echo '<pre>';print_r($html);exit;
							$this->load->library('pdf');
							$pdf = $this->pdf->load();
							$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
							$pdf->SetDisplayMode('fullpage');
							$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
							$pdf->WriteHTML($html); // write the HTML into the PDF
							$pdf->Output($pdfFilePath, 'F');
							$update_data=array(
							'invoice_name'=>$file_name,
							'staus'=>1,
							);
							$this->Employee_model->update_project_bills($biil_save,$update_data);
							$this->email->set_newline("\r\n");
							$this->email->from('sales@prachatech.com');
							$this->email->to($data['billing_details']['email_id']);
							$this->email->subject($data['billing_details']['project'].' Inovice');
							$this->email->message('Please find out below attachment');
							$this->email->attach($pdfFilePath);
							$this->email->send();
							
							//echo $this->db->last_query();exit;
							redirect('payment/bill_list');
						
					}
					//echo '<pre>';print_r($biil_save);exit;
				}else{
					$this->session->set_flashdata('loginerror',"Technical problem will occured. Please try again.");
					redirect('payment/billing');
				}
				//echo '<pre>';print_r($biil_save);exit;
			}else{
				redirect('employee');
			}
			
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('employee');
		}
	}
	
	
	
	
	
	
	
}
