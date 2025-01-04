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
        $this->form_validation->set_rules('city', 'City', '');
        $this->form_validation->set_rules('state', 'State', '');
        $this->form_validation->set_rules('zip', 'Zip Code', '');
        
        if ($this->form_validation->run() == FALSE) { 
            $this->form_validation->set_error_delimiters('<div class="text-red">', '</div>');
        } else {
            $order_id = rand(6,490885);
            $data = [
                'created_by'   => $this->session->client_id,
                'order_id'     => $order_id,
                'plan_id'      => $this->input->post('plan_id'),
                'fullName'     => $this->input->post('fullName'),
                'email'        => $this->input->post('email'),
                'phone'        => $this->input->post('phone'),
                'address'      => $this->input->post('address'),
                'city'         => $this->input->post('city'),
                'state'        => $this->input->post('state'),
                'zip'          => $this->input->post('zip'),
                'os_system'    => $this->input->post('os_system'),
                'db_software'  => $this->input->post('db_software'),
                'ctrl_panel'   => $this->input->post('ctrl_panel'),
                'total_price'  => $this->input->post('total_price'),
                'gst_amount'   => $this->input->post('gst_amount'),
                'plan_name'    => $this->input->post('plan_name'),
                'hosting_type' => $this->input->post('hosting_type'),
            ];

            $this->load->model('Notification_Model'); // Make sure the model is loaded

            // Assuming $data contains the notification data
            $dataid = [
                'user_id'    => $this->session->client_id,
                'fullname'   => $this->input->post('fullName'),
                'message'    => 'New Server Order Reveived - #'.$order_id,
                'created_at' => date('d/m/Y H:i:s'),
            ];
            
            // Call the send_real_time_notification method
            $this->Notification_Model->add_notification($dataid);
            


            $this->root->insert_record('tbl_partial_orders',$data);
            $tempdata = array('icon' => 'check', 'success_info' => 'Congrats, Ordered successfully!');
            $this->session->set_tempdata($tempdata, NULL, 3);
            redirect('billing-details/'.$id);
        }
        $data['get_plans'] = $this->root->get_record('tbl_subscriptions',"hosting_type = 'vps'",'*','asc|id');
        $data['id'] = $id;

        $data['get_user_details'] = $this->root->get_record('tbl_users',"id = {$this->session->client_id}");
        
        $this->load->view('public/billing',$data); 
    }

}