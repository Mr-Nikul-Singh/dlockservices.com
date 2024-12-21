<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
        $this->load->model('Setting_Model','setting');

	}

    public function backup(){
        $this->title = "Backups Download";
        $this->load->view('setting/backups');
    }

    public function start_backup(){
        $this->title = "Backups Download";
        $this->load->view('setting/download-backup');
    }

}