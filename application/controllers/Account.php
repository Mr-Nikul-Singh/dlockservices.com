<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->client_id)):
			redirect('login');
		endif;
	}
    
	public function my_account()
    {
		$this->title = 'My Account';
		$userID = $this->session->client_id;
		$data['get_orders'] = $this->root->get_record('tbl_partial_orders',"created_by = $userID");	
        $this->load->view('public/account',$data); 
    }
    
	public function view_orders($order_id)
    {
		$this->title = 'Order Details';
		$userID = $this->session->client_id;
		$data['get_orders'] = $this->root->get_record('tbl_partial_orders',"id = $order_id AND created_by = $userID")[0];
        $this->load->view('public/order-details',$data); 
    }

    public function save_address(){

        $address = xss_security($this->input->post('address'));
        $data = array('address' => $address);
        $id = $this->session->client_id;
        if($this->root->update_record('tbl_users',$data,$id)){
            echo "Updated successfully!";
        }else{
			echo  "Updated!";
		}
		
    }

    public function save_info(){

        $fname = xss_security($this->input->post('fname'));
        $lname = xss_security($this->input->post('lname'));
        $phone = xss_security($this->input->post('phone'));
        $email = xss_security($this->input->post('email'));

        $user_id = $this->session->client_id;

        $checkMail = $this->root->get_record('tbl_users', "email = '$email' AND id != '$user_id'");
        if (!empty($checkMail)) {
            echo "Email already exists!";
            exit;
        } else {
		
            $data  = array(
                'first_name' => $fname,
                'last_name'  => $lname,
                'contact'    => $phone,
                'email'      => $email,
            );
            $id    = $this->session->client_id;
            if($this->root->update_record('tbl_users',$data,$id)){
                echo "Updated successfully!";
            }else{
                echo  "Updated...";
            }
        }
    }

    public function update_password() {
        // Load necessary helpers or libraries if not autoloaded
        $this->load->library('session');
        $this->load->helper('security');
    
        // Retrieve and sanitize inputs
        $old_password = $this->input->post('old_password', true);
        $new_password = $this->input->post('new_password', true);
        $confirm_password = $this->input->post('confirm_password', true);
    
        // Validate that all fields are present
        if (!$old_password || !$new_password || !$confirm_password) {
            echo json_encode(['message' => 'Please fill in all fields.']);
            return;
        }
    
        // Check if new password matches confirm password
        if ($new_password !== $confirm_password) {
            echo json_encode(['message' => 'New password and confirm password do not match.']);
            return;
        }
    
        // Get current user info
        $user_id = $this->session->client_id;
        $user = $this->root->get_record('tbl_users', "id = '$user_id'");
    
        // Verify old password
        if (!password_verify($old_password, $user[0]->password)) {
            echo json_encode(['message' => 'Current password is incorrect.']);
            return;
        }
    
        // Hash the new password and update the database
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $update = $this->root->update_record('tbl_users', array('password' => $new_password_hashed),$user_id);
    
        if ($update) {
            // Password updated successfully
            echo json_encode(['message' => 'Password updated successfully.','status' => '200']);
        } else {
            // Error during update
            echo json_encode(['message' => 'Failed to update password.']);
        }
    }
    
}