<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MetaSettings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
        $this->load->model('Setting_Model','setting');
        $this->load->library('upload');  

	}

    public function settingofsite(){
        $this->title = "Website Meta Settings";
		$data['get_site_settings'] = $this->root->get_record('tbl_website_settings')[0];
        $this->load->view('setting/settings',$data);
    }

	public function save() {
        $this->form_validation->set_rules('site_name', 'Site Name', 'required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
        $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('footer_text', 'Footer Text', 'required');
        $this->form_validation->set_rules('google_map_code', 'google map code', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('setting/settings');
        } else {
            $data = [
                'site_name'        => $this->input->post('site_name'),
                'meta_title'       => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keywords'    => $this->input->post('meta_keywords'),
                'footer_text'      => $this->input->post('footer_text'),
                'google_analytics' => $this->input->post('google_analytics'),
                'seo_keywords'     => $this->input->post('seo_keywords'),
                'google_map'       => $this->input->post('google_map_code')
            ];
            $base_upload_path = FCPATH . 'assets/meta';

            // Upload Site Logo
            if (!empty($_FILES['site_logo']['name'])) {
                $config['upload_path'] = $base_upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = 'logo_'.time();

                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('site_logo')) {
                    $uploadData = $this->upload->data();
                    $data['site_logo'] = $uploadData['file_name'];
                } else {
                    // Show the error message
                    echo $this->upload->display_errors();
                }
            }

            if (!empty($_FILES['site_favicon']['name'])) {
                $config['upload_path'] = $base_upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|ico';
                $config['file_name'] = 'favicon_'.time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('site_favicon')) {
                    $uploadData = $this->upload->data();
                    $data['site_favicon'] = $uploadData['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            }
 

            $this->setting->update_settings($data);
            $tempdata = array('icon' => 'check', 'success' => 'Meta settings updated successfully.');
            $this->session->set_tempdata($tempdata, NULL, 3);
            redirect('setting/site-settings');
        }
    }

}