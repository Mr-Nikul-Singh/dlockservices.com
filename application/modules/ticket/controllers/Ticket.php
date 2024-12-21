<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
        $this->load->model('Ticket_Model','ticket');

	}
    
    public function index(){
        $this->title = "Tickets";
        get_limit_message();
		$config['base_url']    = site_url("ticket/tickets");
		$config['total_rows']  = $this->ticket->get_tickets_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_tickets'] = $this->ticket->get_tickets($config['per_page'],$page);
        $this->load->view('ticket/tickets',$data);
    }

    public function add(){
        $this->title = 'Create Ticket';
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('priority', 'priority', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }else{

            $data = array(
                'created_by'  => $this->session->user_id,
                'ticket_id'   => generateInvoiceID(),
                'category'    => $this->input->post('category'),
                'priority'    => $this->input->post('priority'),
                'subject'     => $this->input->post('subject'),
                'status'      => $this->input->post('status'),
                'description' => $this->input->post('description'),
            );
            
            $tempdata = array('icon' => 'check', 'success' => 'Ticket created successfully.');
            if($this->root->insert_record('tbl_tickets',$data,$id) == true):
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('ticket/tickets');
            endif;
            
        }
        $this->load->view('ticket/add-ticket');
    }

    public function edit(){
        $this->title = 'Edit Ticket';
        $this->load->view('ticket/edit-ticket');
    }

    public function delete(){
        if($this->ticket->delete_record($this->input->post('id'))):
            $response = array(
                'message' => 'Ticket deleted successfully.',
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

}