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
		}
	public function index()
	{	
		if($this->session->userdata('rs_d'))
			{
					$cd=$this->session->userdata('rs_d');
					$data['p_list']=$this->Payment_model->get_active_payment_list();
					//echo '<pre>';print_r($data);exit;
					$this->load->view('html/payment_list',$data);
					$this->load->view('html/footer');
					$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function details()
	{	
		if($this->session->userdata('rs_d'))
			{
					$cd=$this->session->userdata('rs_d');
					$pid=base64_decode($this->uri->segment(3));
					if($pid==''){
						$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
						redirect('payment/index');
					}
					$data['p_d']=$this->Payment_model->get_payment_details($pid);
					//echo '<pre>';print_r($data);exit;
					$this->load->view('html/payment_details',$data);
					$this->load->view('html/footer');
					$this->load->view('html/footer-links');
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}
	public function confirmation()
	{	
		if($this->session->userdata('rs_d'))
			{
					$cd=$this->session->userdata('rs_d');
					$post=$this->input->post();
					$api_id= $this->config->item('keyId');
					$api_Secret= $this->config->item('API_keySecret');
					$api = new RazorpayApi($api_id,$api_Secret);
					$p_d=$this->Payment_model->get_payment_details($post['p_id']);
					$user_d=$this->Payment_model->get_user_details($cd['c_id']);
					if($post['c_amount']!=''){
						$total_pay_amt=(($p_d['amt'])-($p_d['promo_amt']));
					}else{
						$total_pay_amt=$p_d['amt'];
					}
					$orderData = [
						'receipt'         => $cd['c_id'],
						'amount'          => $total_pay_amt * 100, // 2000 rupees in paise
						'currency'        => 'INR',
						'payment_capture' => 1 // auto capture
					];
					$data['p_post_d']=$post;
					$data['paid_amt']=$total_pay_amt;
					$data['p_de']=$p_d;
					$data['u_de']=$user_d;
					$razorpayOrder = $api->order->create($orderData);
					//echo '<pre>';print_r($razorpayOrder);exit;
					$razorpayOrderId = $razorpayOrder['id'];
					$displayAmount = $amount = $orderData['amount'];
					$displayCurrency=$orderData['currency'];
					$data['details'] = [
								"key"               => $api_id,
								"amount"            => $amount,
								"name"              => $user_d['name'],
								"description"       => $p_d['title'],
								"image"             => "",
								"prefill"           => [
								"name"              => $user_d['name'],
								"email"             => $user_d['email'],
								"contact"           => $user_d['mobile'],
								],
								"notes"             => [
								"address"           => $user_d['address'],
								"merchant_order_id" => "12312321",
								],
								"theme"             => [
								"color"             => "#F37254"
								],
								"order_id"          => $razorpayOrderId,
								"display_currency"          => $orderData['currency'],
				];
					$this->load->view('html/pay',$data);
					$this->load->view('html/footer');
					$this->load->view('html/footer-links');
					//echo '<pre>';print_r($data);exit;
					
			}else{
				$this->session->set_flashdata('error',"Please log in or sign up to continue");
				redirect('user');
			}
	}	
	
	public  function successpost(){
		if($this->session->userdata('rs_d'))
		{ 
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$cd=$this->session->userdata('rs_d');
				//echo '<pre>';print_r($cd);exit;
				$d=array(
				'c_id'=>isset($cd['c_id'])?$cd['c_id']:'',
				'p_id'=>isset($post['p_id'])?$post['p_id']:'',
				'total_amt'=>isset($post['total_amt'])?$post['total_amt']:'',
				'paid_amt'=>isset($post['paid_amt'])?$post['paid_amt']:'',
				'coupon_code'=>isset($post['coupon_code'])?$post['coupon_code']:'',
				'razorpay_payment_id'=>isset($post['razorpay_payment_id'])?$post['razorpay_payment_id']:'',
				'razorpay_order_id'=>isset($post['razorpay_order_id'])?$post['razorpay_order_id']:'',
				'razorpay_signature'=>isset($post['razorpay_signature'])?$post['razorpay_signature']:'',
				'created_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($cd['c_id'])?$cd['c_id']:'',
				);
				//echo '<pre>';print_r($d);exit;
				$save=$this->Payment_model->save_user_payments($d);
				if(count($save)>0){
					$this->session->set_flashdata('success','Payment successfully completed');
					redirect('payment/success/'.base64_encode($save));
				}else{
					$this->session->set_flashdata('error','Technical problem will occured. Please try again');
					redirect('payment/details/'.base64_encode($post['p_id']));
				}
				
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('user');
		}
	}
	public  function success(){
		if($this->session->userdata('rs_d'))
		{ 
				$post=$this->input->post();
				$cd=$this->session->userdata('rs_d');
					$pid=base64_decode($this->uri->segment(3));
					if($pid==''){
						$this->session->set_flashdata('error',"Technical problem will occured. Please try again");
						redirect('payment/index');
					}
				$data['p_d']=$this->Payment_model->get_paid_amt_details($pid);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('html/success',$data);
				$this->load->view('html/footer');
				$this->load->view('html/footer-links');
				
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('user');
		}
	}
	public  function check_coupon_code(){
		if($this->session->userdata('rs_d'))
		{ 
				$post=$this->input->post();
				$details=$this->Payment_model->get_payment_details($post['p_id']);
				if(count($details)>0){
					if($details['promo']==$post['p_code']){
						$amt=(($details['amt'])-($details['promo_amt']));
						$data['msg']=1;
						$data['text']='<span style="color:green">Promo code successfully applied. Discount amount is </span>'.$details['promo_amt'];
						$data['c_amount']=$details['promo_amt'];
					}else{
						$data['msg']=0;
					}					
					echo json_encode($data);exit;
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('user');
		}
	}
	
	
	
	
	
	
	
	
	
}
