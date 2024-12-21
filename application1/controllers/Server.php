<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Server extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
    
	public function vps_server()
    {
        $this->title = 'VPS Server';
        $data['get_plans'] = $this->root->get_record('tbl_subscriptions',"hosting_type = 'vps'",'*','asc|id');
        $this->load->view('public/servers/vps-servers',$data); 
    }
    
	public function cloud_server()
    {
        $this->title = 'Cloud Server';
        $data['get_plans'] = $this->root->get_record('tbl_subscriptions',"hosting_type = 'cloud'",'*','asc|id');
        $this->load->view('public/servers/cloud-servers',$data); 
    }
    
	public function dedicated_server()
    {
        $this->title = 'Dedicated Server';
        $data['get_plans'] = $this->root->get_record('tbl_subscriptions',"hosting_type = 'dedicated'",'*','asc|id');
        $this->load->view('public/servers/dedicated-servers',$data); 
    }
}