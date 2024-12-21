<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
        $this->load->model('Blog_Model','blog');
	}

        
    public function list(){

        $this->title = "Blog Posts";
        get_limit_message();
		$config['base_url']    = site_url("blog/blogs");
		$config['total_rows']  = $this->blog->get_blog_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_posts'] = $this->blog->get_blog($config['per_page'],$page);
        $this->load->view('blog/blogs',$data);
    }

    public function add_blog(){
        
        $this->form_validation->set_rules('blog_title','blog title','required');
		$this->form_validation->set_rules('content','content','trim|required');
		$this->form_validation->set_rules('category','category','trim|required');
		$this->form_validation->set_rules('status','status','trim|required');
		$this->form_validation->set_rules('tags','tags','trim');
		$this->form_validation->set_rules('author','author','trim');

		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		else:

            $infoData = array(
                'category_id' => xss_security($this->input->post('category')),
                'blog_title'  => xss_security($this->input->post('blog_title')),
                'slug_url'    => slug_generate($this->input->post('blog_title')),
                'content'     => htmlspecialchars($this->input->post('content')),
                'tags'        => htmlspecialchars($this->input->post('tags')),
                'author'      => htmlspecialchars($this->input->post('author')),
                'status'      => $this->input->post('status'),
            );

            $tempdata = array('icon' => 'check', 'success' => 'Blog post added successfully.');
            if($this->root->insert_record('tbl_blog',$infoData,$id) == true):
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('blog/blogs');
            endif;

		endif;

        $createdBy = $this->session->user_id;
        $data['get_parent_categories'] =  $this->root->get_record('tbl_category',"is_parent IS NULL");
        $data['get_categories'] =  $this->root->get_record('tbl_category',"is_parent IS NOT NULL");

        $this->load->view('blog/blog-add',$data);
    }

    public function edit_blog(int $id){
        
        $this->form_validation->set_rules('blog_title','blog title','required');
		$this->form_validation->set_rules('content','content','trim|required');
		$this->form_validation->set_rules('category','category','trim|required');
		$this->form_validation->set_rules('status','status','trim|required');
		$this->form_validation->set_rules('tags','tags','trim');
		$this->form_validation->set_rules('author','author','trim');

		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		else:

            $infoData = array(
                'category_id' => xss_security($this->input->post('category')),
                'blog_title'  => xss_security($this->input->post('blog_title')),
                'slug_url'    => slug_generate($this->input->post('blog_title')),
                'content'     => htmlspecialchars($this->input->post('content')),
                'tags'        => htmlspecialchars($this->input->post('tags')),
                'author'      => htmlspecialchars($this->input->post('author')),
                'status'      => $this->input->post('status'),
            );

            $tempdata = array('icon' => 'check', 'success' => 'Blog post updated successfully.');
            if($this->blog->update_blog($infoData,$id) == true):
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('blog/blogs');
            endif;

		endif;

        $createdBy                     = $this->session->user_id;
        $data['get_parent_categories'] = $this->root->get_record('tbl_category',"is_parent IS NULL");
        $data['get_categories']        = $this->root->get_record('tbl_category',"is_parent IS NOT NULL");
        $data['get_blog_data']         = $this->root->get_record('tbl_blog',"id = $id");

        $data['id'] = $id;
        $this->load->view('blog/blog-edit',$data);
    }


    public function delete_blog_post(){

        if($this->blog->delete_record($this->input->post('id'))):
            $response = array(
                'message' => 'Blog post deleted successfully.',
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