<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return void
	 * Admin login
	 */
	public function login()
	{
		$this->title = "Login";
		if(isset($this->session->user_id)):
			redirect('dashboard');
		endif;

		$data['login_error'] = '';
		$this->form_validation->set_rules('username','Username','trim|required|valid_email');
		$this->form_validation->set_rules('password','password','trim|required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('secret_pin','secret pin','trim|required|exact_length[6]');
		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-red">', '</div>');
		else:
			$username    = xss_security($this->input->post('username',true));
			$password    = xss_security($this->input->post('password',true));
			$secret_pin  = xss_security($this->input->post('secret_pin',true));
			$login_valid = $this->login->login_valid($username,$password,$secret_pin);
			$location_details     = '';
			// $location_details     = file_get_contents("https://ipinfo.io/".detect_client_ip()."/?token=94c93924db6646");

			if($login_valid == true): 

				$detect_data = array(
					'created_by'       => $this->session->user_id,
					'email'            => $username,
					'status'           => ($login_valid == true) ? 'success' : 'failed',
					'user_type'        => '',
					'error_type'       => 'login success',
					'location_details' => $location_details,
					'created_at'       => date('Y-m-d H:i:s')
				);
				detect_user_activity($detect_data);

				redirect('dashboard');
			else: 
				$AccountStatus = $this->login->get_login_status($username);
				if($AccountStatus == 'suspended'){
					$message = 'Your Account Has Been Suspended';
				}else{
					$message = 'Your login credentials are incorrect!';
				}
				$data['login_error'] = '<div class="text-center mb-3"><span style="font-weight:bold;color:#FDB186;">'.$message.'</span></div>';
					
				$detect_data = array(
					'email'            => $username,
					'status'           => ($login_valid == true) ? 'success' : 'failed',
					'user_type'        => '',
					'error_type'       => 'your login credentials are incorrect',
					'location_details' => $location_details,
					'created_at'       => date('Y-m-d H:i:s')
				);
				detect_user_activity($detect_data);
			endif;
		endif; 
		$this->load->view('auth/login',$data);
	}

	/**
	 * @return void
	 * Logout
	 */
	public function logout(){
		unset($_SESSION['user_id']);
		unset($_SESSION['email']);
		// session_destroy();
		redirect('auth/login');
	}
}