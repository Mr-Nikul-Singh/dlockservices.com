<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
    
	public function billing_details($id)
    {
        if(!isset($this->session->client_id)):
			redirect('login');
		endif;
        $this->title = 'Order Details';
        $this->form_validation->set_rules('fullName', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('zip', 'Zip Code', 'required');
        $this->form_validation->set_rules('serverType', 'Server Type', 'required');
        $this->form_validation->set_rules('cpuCores', 'CPU Cores', 'required');
        $this->form_validation->set_rules('ramSize', 'RAM Size', 'required');
        $this->form_validation->set_rules('storage', 'Storage', 'required');
        $this->form_validation->set_rules('os', 'Operating System', 'required');

        if ($this->form_validation->run() == FALSE) { 
			$this->form_validation->set_error_delimiters('<div class="text-red">', '</div>');
        } else {
            $data = [
                'created_by' => $this->session->client_id,
                'order_id'   => rand(6,490885),
                'fullName'   => $this->input->post('fullName'),
                'email'      => $this->input->post('email'),
                'phone'      => $this->input->post('phone'),
                'address'    => $this->input->post('address'),
                'city'       => $this->input->post('city'),
                'state'      => $this->input->post('state'),
                'zip'        => $this->input->post('zip'),
                'serverType' => $this->input->post('serverType'),
                'cpuCores'   => $this->input->post('cpuCores'),
                'ramSize'    => $this->input->post('ramSize'),
                'storage'    => $this->input->post('storage'),
                'os'         => $this->input->post('os')
            ];

            $this->root->insert_record('tbl_partial_orders',$data);
            $this->session->set_flashdata('success_message', 'Congrats, Ordered successfully!');
            redirect('billing-details/'.$id);
        }
        $data['get_plans'] = $this->root->get_record('tbl_subscriptions',"hosting_type = 'vps'",'*','asc|id');
        $data['id'] = $id;

        $data['get_user_details'] = $this->root->get_record('tbl_users',"id = {$this->session->client_id}");
        
        $this->load->view('public/billing',$data); 
    }

}