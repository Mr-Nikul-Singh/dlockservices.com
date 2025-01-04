<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ticket Controller
 * 
 * Handles ticket management operations, including listing, adding, editing, 
 * and deleting tickets. Includes session validation to ensure the user is authenticated.
 */
class Ticket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->client_id)):
			redirect('login');
		endif;
        $this->load->model('Ticket_Model','ticket');
	}
    
    /**
     * Constructor
     * 
     * Loads the required model and ensures the user is authenticated before 
     * accessing any method in this controller.
     */
    public function index(){
        $this->title = "Tickets";
        get_limit_message();
		$config['base_url']    = site_url("tickets");
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

    /**
     * Add Ticket
     * 
     * Displays a form for creating a new ticket and processes the submitted data.
     * Validates the input fields and inserts the new ticket into the database.
     */
    public function add(){
        $this->title = 'Create Ticket';
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('priority', 'priority', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }else{

            $data = array(
                'created_by'  => $this->session->client_id,
                'ticket_id'   => generateInvoiceID(),
                'category'    => $this->input->post('category'),
                'priority'    => $this->input->post('priority'),
                'subject'     => xss_security($this->input->post('subject')),
                'status'      => 'Open',
                'description' => $this->input->post('description'),
            );
            
            $tempdata = array('icon' => 'check', 'success' => 'Ticket created successfully.');
            if($this->root->insert_record('tbl_tickets',$data) == true):
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('my-account/#ticket');
            endif;

        }
        $this->load->view('public/support');
    }

    public function view($ticket_id) {

        $data['ticket'] = $this->ticket->get_ticket_by_id($ticket_id);
        $data['replies'] = $this->ticket->get_replies($ticket_id);
        // pre($data['replies']);
        $this->load->view('public/tickets/view-ticket', $data);
    }

    public function add_reply($ticket_id) {
        $this->form_validation->set_rules('reply_message', 'Reply Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        } else {
            $data = array(
                'ticket_id'     => $ticket_id,
                'replied_by'    => $this->session->client_id,
                'reply_message' => $this->input->post('reply_message'),
                'is_private'    => $this->input->post('is_private') ? 1 : 0,
            );

            if ($this->root->insert_record('tbl_ticket_replies',$data)) {
                $tempdata = array('icon' => 'check', 'success' => 'Reply added successfully.');
                $this->session->set_tempdata($tempdata, NULL, 3);
            } else {
                $tempdata = array('icon' => 'error', 'success' => 'Failed to add reply.');
                $this->session->set_tempdata($tempdata, NULL, 3);
            }
            redirect("view-ticket/$ticket_id");
        }
    }

}