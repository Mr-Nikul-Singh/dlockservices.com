<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
        $this->load->library('upload');
        $this->load->model('Review_Model','review');
	}

    public function index(){
        $this->title = "Reviews";
		get_limit_message();
		$config['base_url']    = site_url("review/reviews");
		$config['total_rows']  = $this->review->get_reviews_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
		$config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_reviews'] = $this->review->get_reviews($config['per_page'],$page);
        $this->load->view('review/reviews',$data);
    }

    public function add_review(){
        $this->title = "Add Review";
        $this->form_validation->set_rules('reviewer_name', 'Your Name', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('review_text', 'Review', 'required');

        if ($this->form_validation->run() == FALSE) {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        } else {

            $data = array(
                'reviewer_name' => $this->input->post('reviewer_name'),
                'rating' => $this->input->post('rating'),
                'review_text' => $this->input->post('review_text'),
            );

            if ($_FILES['review_image']['name']) {

                if(!is_dir('assets/reviews/')){
                    mkdir('assets/reviews');
                }
                $config['upload_path']   = 'assets/reviews/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 8048;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('review_image')) {
                    $upload_data = $this->upload->data();
                    $data['image'] = $upload_data['file_name'];
                } else {
                    $data['image'] = null;
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }

            $this->root->insert_record('tbl_reviews',$data);

            $this->session->set_flashdata('success', 'Review added successfully!');
            redirect('review/reviews');
        }
        $this->load->view('review/add-review');
    }

    public function edit_review($id){
        $this->title = "Edit Review";
        $this->form_validation->set_rules('reviewer_name', 'Your Name', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('review_text', 'Review', 'required');

        if ($this->form_validation->run() == FALSE) {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        } else {

            $data = array(
                'reviewer_name' => $this->input->post('reviewer_name'),
                'rating' => $this->input->post('rating'),
                'review_text' => $this->input->post('review_text'),
            );

            if ($_FILES['review_image']['name']) {

                if(!is_dir('assets/reviews/')){
                    mkdir('assets/reviews');
                }
                $config['upload_path']   = 'assets/reviews/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 8048;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('review_image')) {
                    $upload_data = $this->upload->data();
                    $data['image'] = $upload_data['file_name'];
                } else {
                    $data['image'] = null;
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }

            $this->root->update_record('tbl_reviews',$data,$id);

            $this->session->set_flashdata('success', 'Review updated successfully!');
            redirect('review/reviews');
        }
        $data['get_reviews'] = $this->root->get_record('tbl_reviews',"id=$id")[0];
        $this->load->view('review/edit-review',$data);
    }

    public function delete_review(){

        if($this->root->delete_record('tbl_reviews',$this->input->post('id'))):
            $response = array(
                'message' => 'Review deleted successfully.',
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