<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

    /** 
	 * @return void
	 */
    public function sitemap(){
        header("Content-Type: application/xml; charset=utf-8");
        $data['blog'] = $this->root->get_record('tbl_blog',"status = 'published'");
        $this->load->view('public/sitemap',$data);
    }
    
    
	public function index()
    {
        $data['get_reviews'] = $this->root->get_record('tbl_reviews',"status = '1'",'*','asc|id');
        $data['get_plans']   = $this->root->get_record('tbl_subscriptions',"hosting_type = 'vps'",'*','asc|id');
        $this->load->view('public/home',$data); 
    }

    public function about()
    {
        $this->title = 'About Us';
        $this->load->view('public/about');
    }

    public function faq()
    {
        $this->title = 'Frequently Asked Questions';
        $this->load->view('public/faq');
    }

    public function contact_us()
    {
        $this->title = 'Contact Us';
        $this->load->view('public/contact-us');
    }

    public function validate_strict_email($email)
    {
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        
        if (preg_match($pattern, $email)) {
            return true;
        } else {
            $this->form_validation->set_message('validate_strict_email', 'Please enter a valid email address.');
            return false;
        }
    }

    public function submit_contact()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_validate_strict_email');
        $this->form_validation->set_rules('comments', 'Comments', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['success' => false, 'error' => validation_errors()]);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('comments')
            ];

            $insert_id = $this->root->insert_record('tbl_contacts',$data);

            if ($insert_id) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to save data.']);
            }
        }
    }


    public function plans()
    {
        $this->title = 'Plans';
        $this->load->view('public/plans');
    }

    public function privacy()
    {
        $this->title = 'Privacy & Policy';
        $this->load->view('public/privacy');
    }

    public function refund_policy()
    {
        $this->title = 'Refund Policy';
        $this->load->view('public/refund-policy');
    }

    public function terms()
    {
        $this->title = 'Terms & Conditions';
        $this->load->view('public/terms');
    }

    public function error_404(){
        $this->title = 'Page Not Found 404!';
        $this->load->view('public/error_404');
    }
}
?>