<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('login');
		endif;
        $this->load->model('Contact_Model', 'contacts');
	}

    
    public function contacts(){
        $this->title = "Contacts";
        get_limit_message();
		$config['base_url']    = site_url("contacts");
		$config['total_rows']  = $this->contacts->get_contacts_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 2;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_contacts'] = $this->contacts->get_contacts($config['per_page'],$page);
        $this->load->view('contact/contacts',$data);
    }

    public function export_contacts(){
		$columns = $this->root->describe('tbl_contacts');
	
        $data = $this->root->get_record('tbl_contacts',null,null,null,'array');

		$data = array(
			'download' => true,
			'columns'  => $columns,
			'rows'     => $data,
			'filename' => date('d-m-y').'-'.uniqid(),
		);

		$this->excel->download($data);
    }

    public function delete_contact(){
        if($this->contacts->delete_record($this->input->post('id')) == true):
            $response = array(
                'message' => 'Contact deleted successfully.',
                'icon'    => 'success',
                'status'  => '200'
            );
        else:
            $response = array(
                'message' => 'Technical issue!',
                'icon'    => 'exclamation-triangle',
                'status'  => '404'
            );
        endif;

        echo json_encode($response);
    }
}