<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
        $this->load->model('Setting_Model','setting');

	}

    public function settings(){
        $this->title = "Software Settings";
        $this->load->view('setting/setting');
    }

    /**
     * @return void
     * Change password only for admin
     */
    public function change_password(){

        $this->title = "Change Password";
        $data['error'] = '';
        $this->form_validation->set_rules('old_password','current password','trim|required|min_length[8]|max_length[16]');
        $this->form_validation->set_rules('new_password','new password','trim|required|min_length[8]|max_length[16]');
        $this->form_validation->set_rules('confirm_password','confirm password','trim|required|min_length[8]|max_length[16]|matches[new_password]');
        if($this->form_validation->run() == false): 
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        else: 
            $data['error'] = $this->login->change_password();
            if($data['error'] === 'TRUE'): 
                $this->root->update_record('tbl_users',array('password' => password_hash($this->input->post('confirm_password'),PASSWORD_DEFAULT)),$this->session->user_id);
                $tempdata = array('icon' => 'check', 'success' => 'Updated successsfully.');
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('auth/logout');
            else:
                $tempdata = array('icon' => 'alert-triangle', 'success' => $data['error']);
                $this->session->set_tempdata($tempdata, NULL, 3);
            endif;
        endif;
        $user_id = $this->session->user_id;
        $this->load->view('setting/change_password',$data);
    }

    public function profile_details(){
        
        $this->title = 'Profile Details';
        $data['get_users'] = $this->root->get_record('tbl_users',"id = {$this->session->user_id}");
        $this->load->view('setting/profile',$data);
    }

    public function profile_update(){
 
        $this->title = 'Profile Update';
        $data['profile_file_error'] = '';
        $data['logo_file_error']    = '';

        $data['get_users'] = $this->root->get_record('tbl_users',"id = {$this->session->user_id}");
        $email_check = @$data['get_users'][0]->email;
        if(!empty($email_check)):
			$email = xss_security($this->input->post('email'));
			if(!empty($email)):
				if($email !== $email_check):
					$this->form_validation->set_rules('email','email','required|valid_email|is_unique[tbl_users.email]');
				else:
					$this->form_validation->set_rules('email','email','required|valid_email');
				endif;
			endif;
		endif;
        
        $this->form_validation->set_rules('username','full name','trim|required');
        $this->form_validation->set_rules('contact','mobile number','trim|required|exact_length[10]');
        $this->form_validation->set_rules('address','address','trim|required');
        $this->form_validation->set_rules('city','city','trim|required');
        $this->form_validation->set_rules('country','country','trim|required');
        $this->form_validation->set_rules('state','state','trim|required');
        $this->form_validation->set_rules('zip_code','zip code','trim|required|exact_length[6]');
        $this->form_validation->set_rules('designation','designation','trim');
        $this->form_validation->set_rules('occupation','profession','trim');
        $this->form_validation->set_rules('organization','organization','trim');
        if($this->form_validation->run() == false): 
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        else:

            $ok = 1;
            if(!empty($_FILES['profile_pic']['name'])){
                $profile_file = $_FILES['profile_pic']['name'];
                $profile_tmp  = $_FILES['profile_pic']['tmp_name'];
            
                // Check if the file is an image with a valid extension
                $allowed_extensions = array('png', 'jpg', 'jpeg');
                $file_extension = strtolower(pathinfo($profile_file, PATHINFO_EXTENSION));
                
                if (!in_array($file_extension, $allowed_extensions)) {
                    // Invalid file extension, handle the error as per your requirement
                    // For example, show an error message or redirect back with an error.
                    $data['profile_file_error'] = "Invalid file extension. Only PNG, JPG, and JPEG files are allowed.";
                    $ok = 0;
                }
            
                // Generate a unique file name for the uploaded image
                $unique_file_name = uniqid('profile_') . '.' . $file_extension;
            
                // Move the uploaded file to the destination folder
                $folder = 'assets/img/profile/';
                $destination = $folder . $unique_file_name;
            
                if($ok == 1){
                    if (move_uploaded_file($profile_tmp, $destination)) {
                        $ok = 1;
                        $profile_file_ = $unique_file_name;
                        $oldimage0 = $this->session->userdata('profile_picture');
                        if(file_exists($folder.$oldimage0)){
                            unlink($folder.$oldimage0);
                        }
                        $this->session->set_userdata(array('profile_picture' => $profile_file_));
                    } else {
                        $data['profile_file_error'] = "Error uploading file.";
                        $ok = 0;
                    }
                }
            }

            $data_info = array(
                'full_name'        => xss_security($this->input->post('username')),
                'mobile_no'         => xss_security($this->input->post('contact')),
                'email'           => xss_security($this->input->post('email')),
                'address'         => xss_security($this->input->post('address')),
                'city'            => xss_security($this->input->post('city')),
                'country'         => xss_security($this->input->post('country')),
                'state'           => xss_security($this->input->post('state')),
                'zip_code'        => xss_security($this->input->post('zip_code')),
                // 'designation'     => xss_security($this->input->post('designation')),
                'occupation'      => xss_security($this->input->post('occupation')),
                'profile_picture' => (!empty($profile_file_)) ? $profile_file_ : $data['get_users'][0]->profile_picture,
            );
            if($this->root->update_record('tbl_users',$data_info,$this->session->user_id) == true){
                $tempdata = array('icon' => 'check', 'success' => 'Profile updated successfully.');
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('setting/profile-details','refresh');
            }

        endif;
        $this->load->view('setting/update_profile',$data);
    }

    public function pager_limit(){
        if(!empty($this->input->post('limit'))):
            $_SESSION['old_limit'] = 'new';
            $_SESSION['limit'] = $this->input->post('limit');
        endif;
    }
}