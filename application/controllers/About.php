<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Frontend.php');
class About extends Frontend {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{	
		$this->load->view('html/about-us');
		$this->load->view('html/footer');
		$this->load->view('html/footer-links');
	}
	
}
