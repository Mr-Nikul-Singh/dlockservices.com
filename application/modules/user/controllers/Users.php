<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
		$this->load->model('User_Model','user');

	}
	
	public function users(){
		$this->title = "Users";
		get_limit_message();
		$config['base_url']    = site_url("user/users");
		$config['total_rows']  = $this->user->get_users_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
		$config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_users'] = $this->user->get_users($config['per_page'],$page);
        $this->load->view('user/users',$data);
	}
	
	public function view_user(int $id){
		
        $this->title = "User Details";
        $data['get_user_data'] = $this->user->get_user_details($id);
		$creator_id = (!empty($data['get_user_data'][0]->created_by) ? $data['get_user_data'][0]->created_by : 0);
        $data['get_creator_data'] = $this->root->get_record('tbl_users',"id = '{$creator_id}'",'type as creator_type|username as creator_name|email as creator_email|contact as creator_contact');
		$this->load->view('user/view_user',$data);
	}

	/**
	 * @return void
	 * Admin login
	 */
	public function add_user()
	{
		$this->title = "Add User";

		$Uid = $this->session->user_id;

		$data['error'] = (object) '';
		$config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path'   => 'assets/img/profile/',
            'file_exist'    => true,
            'file_size'     => '*',
            'multiple'      => false,
            'prifix'        => true,
            'suffix'        => '',
        );
		$this->form_validation->set_rules('username','username','required|regex_match[/^[a-zA-Z0-9 ]+$/]');
		$this->form_validation->set_rules('mobile','mobile number','trim|required|numeric');
		$this->form_validation->set_rules('email','email','required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('password','password','trim|min_length[8]|max_length[16]');

		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		else:

            if(isset($_FILES['photo']['name'])):
                $this->upload_->initialize($config);
                $this->upload_->upload('photo',$config);
                if($this->upload_->upload_error() == TRUE): 
                    $data['error'] = $this->upload_->upload_error;
                    $ok = 0;
                else:
                    $dfile = $this->upload_->data();
                endif;
            endif;

			if($ok !== 0){
				// Get the first 4 characters of the input username
				$first_four_chars = xss_security($this->input->post('username'));
				// Split the username by space
				$parts = explode(" ", $first_four_chars);
				// Extract the first word
				$first_word = $parts[0];
				// Generate a random number with 4 digits
				$random_number = trim(str_pad(mt_rand(1, 69999), 4, '0', STR_PAD_LEFT));
				// Create the new username by concatenating the first 4 characters, '__', and the random number
				$new_username = rtrim($first_word) . '__' . $random_number;


				$user_data = array(
					'created_by'      => xss_security($this->input->post('employeeid')),
					'username'        => xss_security($this->input->post('username')),
					'login_user_name' => $new_username,
					'contact'         => xss_security($this->input->post('mobile')),
					'email'           => xss_security($this->input->post('email')),
					'password'        => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
					'profile_picture' => (!empty($dfile[0])) ? $dfile[0] : '',
					'type'            => 'user',
					'status'          => '1',
					'expiry_date'     => date('Y-m-d H:i:s', strtotime('+1 month')),
					'created_at'      => date('Y-m-d H:i:s'),
				);
				$this->root->insert_record('tbl_users',$user_data);
				$tempdata = array('icon' => 'check', 'success' => 'User Added successsfully.');
				$this->session->set_tempdata($tempdata, NULL, 3);
				redirect('user/users');
			}

		endif;

		$this->load->view('user/user_add',$data);
	}

	/**
	 * @param int $id
	 * @return void
	 */
	public function edit_user(int $id)
	{
		has_permission('users','edit');

		$this->title = "Edit User";
		$data['error'] = (object) '';
        $config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path'   => 'assets/img/profile/',
            'file_exist'    => true,
            'file_size'     => '*',
            'multiple'      => false,
            'prifix'        => true,
            'suffix'        => '',
        );

		$data['get_user_data'] = $this->user->get_users_where($id);
		$data['id'] = $id;
		$this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('mobile','mobile number','trim|required|numeric');
		$this->form_validation->set_rules('password','password','trim|min_length[8]|max_length[16]');

		if(!empty($id)):
			$email = xss_security($this->input->post('email'));
			$check_mail = $this->root->get_record('tbl_users',"id = '{$id}'",'email');
			if(!empty($email)):
				if($email !== @$check_mail[0]->email):
					$this->form_validation->set_rules('email','email','required|valid_email|is_unique[tbl_users.email]');
				else:
					$this->form_validation->set_rules('email','email','required|valid_email');
				endif;
			endif;
		endif;

		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		else:
			
			$ok = 1;
            if(isset($_FILES['photo']['name'])):
                $this->upload_->initialize($config);
                $this->upload_->upload('photo',$config);
                if($this->upload_->upload_error() == TRUE): 
                    $data['error'] = $this->upload_->upload_error;
                    $ok = 0;
                else:
                    $dfile = $this->upload_->data();
                    $file_storage = (!empty($dfile[0])) ? $dfile[0] : $data['get_user_data'][0]->profile_picture;
                endif;
            endif;
			 
			if($ok !== 0){ 
				if(!empty($this->input->post('password'))):
					$user_data = array(
					'username'        => xss_security($this->input->post('username')),
					'password'        => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
					'contact'         => xss_security($this->input->post('mobile')),
					'email'           => xss_security($this->input->post('email')),
					'profile_picture' => $file_storage,
					);
					$tempdata = array('icon' => 'check', 'success' => 'Password Updated successfully.');
				else:
					$user_data = array(
					'created_by'      => $this->session->user_id,
					'username'        => xss_security($this->input->post('username')),
					'contact'         => xss_security($this->input->post('mobile')),
					'email'           => xss_security($this->input->post('email')),
					'profile_picture' => $file_storage,
					);
				endif;

				$tempdata = array('icon' => 'check', 'success' => 'User Updated successfully.');
				if($this->user->update_users($user_data,$id) == true):
					$this->session->set_tempdata($tempdata, NULL, 3);
					redirect('user/users');
				endif;
			}
		endif;
		$this->load->view('user/user_edit',$data);
	}

	public function export_users(){
        redirect();
		$id = $this->input->post('user_id');
		$columns = $this->root->describe('tbl_users');
		if(!empty($id)):
			$id      = implode(',',$this->input->post('user_id'));			
		endif;

        $data = (!empty($id) ? $this->root->get_record('tbl_users',"id IN($id)",null,null,'array') : $this->root->get_record('tbl_users',"id != '{$this->session->user_id}'",null,null,'array'));

		$data = array(
			'download' => true,
			'columns'  => $columns,
			'rows'     => $data,
			'filename' => date('d-m-y').'-'.uniqid(),
		);
		$this->excel->download($data);
	}

	/** 
	 * @return void
	 */
	public function login_access(){
		$id = $this->input->post('id');
		$status = $this->input->post('status_');
		if(!empty($id)):
			if($status == '0'){
				$data = array('status' => $status,'account_status' => 'blocked');
			}elseif($status == '1'){
				$data = array('status' => $status,'account_status' => 'active');
			}
			if($this->user->update_status($data,$id) == true):
				$response = array(
					'message' => ($status == '1') ? 'Access enable successfully.' : 'Access disabled successfully.',
					'icon'    => 'check',
					'status'  => '200'
				);
			else:
				$response = array(
					'message' => 'Technical issue!',
					'icon'    => 'exclamation-triangle',
					'status'  => '200'
				);
			endif;
		else:
			$response = array(
				'message' => 'Something went wrong!',
				'icon'    => 'exclamation-triangle',
				'status'  => '200'
			);
		endif;
		echo json_encode($response);
	}

}