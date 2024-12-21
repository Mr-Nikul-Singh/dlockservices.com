<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

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
		if(isset($this->session->client_id)):
			redirect('my-account');
		endif;

		$data['login_error'] = '';
		$this->form_validation->set_rules('email','email','trim|required|valid_email');
		$this->form_validation->set_rules('password','password','trim|required|min_length[8]|max_length[16]');
		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-red">', '</div>');
		else:
			$username    = xss_security($this->input->post('email',true));
			$password    = xss_security($this->input->post('password',true));
			$login_valid = $this->login->login_valid_front_end($username,$password);
			$location_details     = '';
			// $location_details     = file_get_contents("https://ipinfo.io/".detect_client_ip()."/?token=94c93924db6646");

			if($login_valid == true): 

				$detect_data = array(
					'created_by'       => $this->session->client_id,
					'email'            => $username,
					'status'           => ($login_valid == true) ? 'success' : 'failed',
					'user_type'        => 'user',
					'error_type'       => 'login success',
					'location_details' => $location_details,
					'created_at'       => date('Y-m-d H:i:s')
				);
				detect_user_activity($detect_data);

				redirect('my-account');
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
		$this->load->view('public/login',$data);
	}

    public function registration(){
		
		$location_details = '';

		$this->title = "Login";
		if(isset($this->session->client_id)):
			redirect('my-account');
		endif;

		$data['login_error'] = '';
		$this->form_validation->set_rules('fname','first name','trim|required');
		$this->form_validation->set_rules('lname','last name','trim|required');
		$this->form_validation->set_rules('terms','terms & conditions','trim|required');
		$this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('password','password','trim|required|min_length[8]|max_length[16]');
		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-red">', '</div>');
		else:

			$fname    = xss_security($this->input->post('fname', true));
			$lname    = xss_security($this->input->post('lname', true));
			$email    = xss_security($this->input->post('email', true));
			$terms    = xss_security($this->input->post('terms', true));
			$password = ($this->input->post('password', true));
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$data = [
				'first_name'        => $fname,
				'last_name'         => $lname,
				'email'             => $email,
				'terms_is_accepted' => $terms,
				'password'          => $hashedPassword,
				'status'            => '1',
				'type'              => 'user',
				'account_status'    => 'active',
			];
			$LastID = $this->root->insert_record('tbl_users', $data);

			$login_valid = $this->login->login_valid_front_end($email,$password);

			if($login_valid == true):
			else:
				$AccountStatus = $this->login->get_login_status($email);
				if($AccountStatus == 'suspended'){
					$message = 'Your Account Has Been Suspended';
				}else{
					$message = 'Your login credentials are incorrect!';
				}
				$data['login_error'] = '<div class="text-center mb-3"><span style="font-weight:bold;color:#FDB186;">'.$message.'</span></div>';
					
				$detect_data = array(
					'email'            => $email,
					'status'           => ($login_valid == true) ? 'success' : 'failed',
					'user_type'        => '',
					'error_type'       => 'your login credentials are incorrect',
					'location_details' => $location_details,
					'created_at'       => date('Y-m-d H:i:s')
				);
				detect_user_activity($detect_data);
				die('unable to login !warning, something went wrong.');
			endif;

			$detect_data = array(
				'email'            => $email,
				'status'           => ($login_valid == true) ? 'success' : 'failed',
				'user_type'        => 'user',
				'error_type'       => 'registration success',
				'location_details' => $location_details,
				'created_at'       => date('Y-m-d H:i:s')
			);
			detect_user_activity($detect_data);
			redirect('my-account');

		endif; 
        $this->load->view('public/registration',$data);
    }

    public function forgot_password(){
        $this->load->view('public/forgot-password');
    }

	/**
	 * @return void
	 * Logout
	 */
	public function front_end_logout(){
		unset($_SESSION['client_id']);
		unset($_SESSION['email']);
		redirect('login');
	}
}