<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if(!isset($this->session->client_id)):
		// 	redirect('auth/login');
		// endif;

	}

    public function support_center(){
        $this->title = "Support Center";
        $this->load->view('public/support');
    }
}