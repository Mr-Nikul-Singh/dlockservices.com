<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
		$this->load->model('Order_Model','order');

	}
	
	public function list(){
		$this->title = "Order's";
		get_limit_message();
		$config['base_url']    = site_url("order/orders");
		$config['total_rows']  = $this->order->get_donor_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
		$config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_orders'] = $this->order->get_orders($config['per_page'],$page);
		// pre($data);
        $this->load->view('order/orders',$data);
	}
	

	public function view_retailer(int $id){
		
		$this->title = "Retailer Details";
		$data['get_donor_data'] = $this->retailer->get_donor_where($id);
		$creator_id = (!empty($data['get_user_data'][0]->created_by) ? $data['get_user_data'][0]->created_by : 0);
		$this->load->view('retailer/view-retailer',$data);
		
	}

	public function delete_retailer(){
		
        if($this->root->delete_record('tbl_users',$this->input->post('id'))):
            $response = array(
                'message' => 'donor deleted successfully.',
                'icon'    => 'success',
                'status'  => '200'
            );
        else:
            $response = array(
                'message' => 'Technical issue!',
                'icon'    => 'error',
                'status'  => '404'
            );
        endif;

        echo json_encode($response);
    }
	

	public function add_retailer()
	{
		$this->title = "Add Retailer";
		$Uid = $this->session->user_id;

		$data['error'] = (object) '';
		$config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path'   => 'assets/img/profile/',
            'file_exist'    => true,
            'file_size'     => '*',
            'multiple'      => true,
            'prifix'        => true,
            'suffix'        => '',
        );
		$this->form_validation->set_rules('full_name','full name','required|regex_match[/^[a-zA-Z0-9 ]+$/]');
		$this->form_validation->set_rules('shop_name','shop_name','required|regex_match[/^[a-zA-Z0-9 () ]+$/]');
		$this->form_validation->set_rules('mobile','mobile number','trim|required|numeric|is_unique[tbl_users.mobile_no]');
		$this->form_validation->set_rules('email','email','required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('password','password','trim|min_length[8]|max_length[16]');
        $this->form_validation->set_rules('gst','gst','trim|required');
        $this->form_validation->set_rules('drug_no','drug number','trim|required');
        $this->form_validation->set_rules('tnc','terms & condition','trim');

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
					'created_by'      => $this->session->user_id,
					'full_name'       => xss_security($this->input->post('full_name')),
					'shop_name'       => xss_security($this->input->post('shop_name')),
					'gst'             => xss_security($this->input->post('gst')),
					'drug_no'         => xss_security($this->input->post('drug_no')),
					'term_conditions' => xss_security($this->input->post('term_conditions')),
					'address'         => xss_security($this->input->post('address')),
					'mobile_no'       => xss_security($this->input->post('mobile')),
					'email'           => xss_security($this->input->post('email')),
					'password'        => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
					'profile_picture' => (!empty($dfile[0])) ? $dfile[0] : '',
					'type'            => 'retailer',
					'status'          => '0',
					'created_at'      => date('Y-m-d H:i:s'),
				);
				$this->root->insert_record('tbl_users',$user_data);
				$tempdata = array('icon' => 'check', 'success' => 'Retailer Added successsfully.');
				$this->session->set_tempdata($tempdata, NULL, 3);
				redirect('retailer/retailers');
			}

		endif;
		$user_id = $this->session->user_id;
		$this->load->view('retailer/add-retailer',$data);
	}

	/**
	 * @param int $id
	 * @return void
	 */
	public function edit_retailer(int $id)
	{
		$this->title = "Edit Retailer";
		$data['error'] = (object) '';
        $config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path'   => 'assets/img/profile/',
            'file_exist'    => true,
            'file_size'     => '*',
            'multiple'      => true,
            'prifix'        => true,
            'suffix'        => '',
        );

		$data['get_donor_data'] = $this->retailer->get_donor_where($id);
		$data['id'] = $id;

		$this->form_validation->set_rules('full_name','full name','required|regex_match[/^[a-zA-Z0-9 ]+$/]');
		$this->form_validation->set_rules('shop_name','shop name','required|regex_match[/^[a-zA-Z0-9() ]+$/]');
		$this->form_validation->set_rules('password','password','trim|min_length[8]|max_length[16]');
        $this->form_validation->set_rules('gst','gst','trim|required');
        $this->form_validation->set_rules('drug_no','drug number','trim|required');
        $this->form_validation->set_rules('tnc','terms & condition','trim');

		if(!empty($id)):
			$contact = xss_security($this->input->post('email'));
			$check_mobile = $this->root->get_record('tbl_users',"id = '{$id}'",'email');
			if(!empty($contact)):
				if($contact != @$check_mobile[0]->email):
					$this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[tbl_users.email]');
				else:
					$this->form_validation->set_rules('email','email','trim|required|valid_email');
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
                    $file_storage = (!empty($dfile[0])) ? $dfile[0] : $data['get_donor_data'][0]->profile_picture;
                endif;
            endif;
			  
			if($ok !== 0){
				if(!empty($this->input->post('password'))):
					$user_data = array(
					'password'        => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
					);
					$tempdata = array('icon' => 'check', 'success' => 'Password Updated successfully.');
				else:

					$user_data = array(
						'full_name'       => xss_security($this->input->post('full_name')),
						'shop_name'       => xss_security($this->input->post('shop_name')),
						'gst'             => xss_security($this->input->post('gst')),
						'drug_no'         => xss_security($this->input->post('drug_no')),
						'term_conditions' => xss_security($this->input->post('tnc')),
						'address'         => xss_security($this->input->post('address')),
						'mobile_no'       => xss_security($this->input->post('mobile')),
						'email'           => xss_security($this->input->post('email')),
						'profile_picture' => $file_storage,
					);
				endif;

				$tempdata = array('icon' => 'check', 'success' => 'Retailer Updated successfully.');
				if($this->retailer->update_donor($user_data,$id) == true):
					$this->session->set_tempdata($tempdata, NULL, 3);
					redirect('retailer/retailers');
				endif;
			}
		endif;
		$this->load->view('retailer/edit-retailer',$data);
	}

	public function export_retailer(){

		$id = $this->input->post('id');
		$columns = $this->root->describe('tbl_users');
		if(!empty($id)):
			$id      = implode(',',$this->input->post('id'));			
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


	public function payment_history(){

		$this->title = "Payment History";
        get_limit_message();
        $config['base_url']    = site_url("subscription/payment-history");
		$config['total_rows']  = $this->order->get_payment_history_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_invoices'] = $this->order->get_payment_history($config['per_page'],$page);
        $this->load->view('order/payment-history',$data);
	}

	public function payment_receipt($id){

		$data['get_invoice_data'] = $this->order->get_payment_invoice($id);
        $this->load->view('order/invoice',$data);
		
	}
}