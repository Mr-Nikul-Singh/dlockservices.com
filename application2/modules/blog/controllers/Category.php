<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)):
			redirect('auth/login');
		endif;
        $this->load->model('Category_Model','category');
	}

    public function list(){
        $this->title = "Categories";
        get_limit_message();
		$config['base_url']    = site_url("blog/categories");
		$config['total_rows']  = $this->category->get_categories_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_categories'] = $this->category->get_categories($config['per_page'],$page);
        $this->load->view('blog/category/categories',$data);
    }

    public function add_category(){

        $this->form_validation->set_rules('category_name','category name','required|regex_match[/^[a-zA-Z0-9- ]+$/]');
		$this->form_validation->set_rules('parent_category','parent category','trim');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('status','status','trim|required');

		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		else:

            $ParentCategory = $this->input->post('parent_category');

            $infoData = array(
                'created_by'    => $this->session->user_id,
                'name' => xss_security($this->input->post('category_name')),
                'description'   => htmlspecialchars($this->input->post('description')),
                'status'        => 'active',
            );

            if(!empty($ParentCategory)){
                $infoData['is_parent'] = $ParentCategory;
            }

            $tempdata = array('icon' => 'check', 'success' => 'Category added successfully.');
            if($this->root->insert_record('tbl_category',$infoData) == true):
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('blog/blog-categories');
            endif;

		endif;
        $createdBy = $this->session->user_id;
        $data['get_parent_categories'] =  $this->root->get_record('tbl_category',"created_by = $createdBy AND is_parent IS NULL");
        $this->load->view('blog/category/category-add',$data);
    }

    public function edit_category(int $id){

        $this->form_validation->set_rules('category_name','category name','required|regex_match[/^[a-zA-Z0-9- ]+$/]');
		$this->form_validation->set_rules('parent_category','parent category','trim');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('status','status','trim|required');

		if($this->form_validation->run() == false):
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		else:

            $ParentCategory = $this->input->post('parent_category');

            $infoData = array(
                'created_by'    => $this->session->user_id,
                'name' => xss_security($this->input->post('category_name')),
                'description'   => htmlspecialchars($this->input->post('description')),
                'status'        => $this->input->post('status'),
            );

            if(!empty($ParentCategory)){
                $infoData['is_parent'] = $ParentCategory;
            }

            $tempdata = array('icon' => 'check', 'success' => 'Category Updated successfully.');
            if($this->category->update_category($infoData,$id) == true):
                $this->session->set_tempdata($tempdata, NULL, 3);
                redirect('blog/blog-categories');
            endif;

		endif;
        $createdBy = $this->session->user_id;
        $data['id'] = $id;
        $data['get_parent_categories'] =  $this->root->get_record('tbl_category',"created_by = $createdBy AND is_parent IS NULL");
        $data['get_category_data'] =  $this->root->get_record('tbl_category',"created_by = $createdBy AND id = $id");
        $this->load->view('blog/category/category-edit',$data);

    }

    public function delete_blog_category(){

        if($this->category->delete_record($this->input->post('id'))):
            $response = array(
                'message' => 'Blog Category deleted successfully.',
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