<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
	}
	
	/**
	 * @return void
	 * dinamic sitemap.xml Gnerate
	 */
	public function sitemap(){
		header("Content-Type: application/xml; charset=utf-8");
		$this->load->view('sitemap'); 
	}

	public function index()  
	{
	    
		$this->title = "Dashboard";
		error_reporting(0);
		$data['total_donors']       = [];
		$data['get_total_events']   = [];
		$data['get_blood_requests'] = [];
		$data['get_login_history']  = $this->dashboard->get_login_history();
		$this->load->view('dashboard/dashboard',$data);
	}
	

	public function data_security(){
		$this->load->view('about/security');
	}
}