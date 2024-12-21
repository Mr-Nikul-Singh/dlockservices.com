<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BLog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('blog/Blog_Model','blog');
	}
    
	public function blog()
    {   $this->title = "Blog Posts";
        get_limit_message();
		$config['base_url']    = site_url("blog/blogs");
		$config['total_rows']  = $this->blog->get_blog_count();
		$config['per_page']    = (isset($_SESSION['limit']) ? $_SESSION['limit'] : '10');
		$config["uri_segment"] = 3;
        $config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"]          = $this->pagination->create_links();
		$data['get_blog'] = $this->blog->get_blog($config['per_page'],$page);
        // $data['get_blog'] = $this->root->get_record('tbl_blog');
        $this->load->view('public/blog',$data); 
    }
    
	public function view_blog($slug)
    {
		$data['get_blog'] = $this->root->get_record('tbl_blog',"slug_url = '$slug'")[0];
        $data['get_category'] = $this->root->get_record('tbl_category');
		$this->title = $data['get_blog']->blog_title;
        $data['slug'] = $slug;
        $this->load->view('public/blog-details',$data); 
    }
}