<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
	}
    
    public function login_history(){
        $this->title = "Login History";
        get_limit_message();
		$config['base_url']    = site_url("history/login-history");
		$config['total_rows']  = $this->history->get_history_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_history'] = $this->history->get_history($config['per_page'],$page);
        $this->load->view('history/login_history',$data);
    }

    public function view_history_details($id){
        $this->title = 'Login history details';
        $data['get_login_history_details'] = $this->root->get_record('tbl_login_history',"id = '$id'");
        $this->load->view('history/view_history',$data);
    }

    public function export_history(){
		$columns = $this->root->describe('tbl_login_history');
	
        $data = $this->root->get_record('tbl_login_history',null,null,null,'array');

		$data = array(
			'download' => true,
			'columns'  => $columns,
			'rows'     => $data,
			'filename' => date('d-m-y').'-login-history-'.uniqid(),
		);

		$this->excel->download($data);
    }

    public function delete_login_history(){
        if($this->history->delete_record($this->input->post('id'))):
            $response = array(
                'message' => 'Login history deleted successfully.',
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