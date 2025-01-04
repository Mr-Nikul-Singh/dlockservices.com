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

    public function delete_bakcup(){
        if (isset($_POST['file'])) {
            $fileName = $_POST['file'];
            $backupDir = 'assets/0000/23939/208203/';
        
            // Get the full file path
            $filePath = $backupDir . $fileName;
        
            // Check if the file exists
            if (file_exists($filePath)) {
                // Attempt to delete the file
                if (unlink($filePath)) {
                    echo 'success'; // Respond with success if the file is deleted
                } else {
                    echo 'error'; // Respond with error if deletion fails
                }
            } else {
                echo 'error'; // Respond with error if the file doesn't exist
            }
        } else {
            echo 'error'; // Respond with error if no file parameter is received
        }
    }

}