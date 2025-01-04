<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->client_id)):
			redirect('login');
		endif;
	}

    public function delete_notification(){

        if($this->root->delete_record('tbl_notifications',$this->input->post('id')) == true):
            $response = array(
                'message' => 'Deleted successfully.',
                'icon'    => 'check',
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

    public function update_setting(){
        $id    = $this->input->post('id');
        $mode  = security($this->input->post('mode'));
        $value = security($this->input->post('value'));

        if($value === 'on' && $mode === 'software_mode'):
            $value = 'production';
        elseif($value === 'off' && $mode === 'software_mode'):
            $value = 'development';
        endif;

        if($this->root->update_record('tbl_settings',array('value' => $value),$id)):
            $response = array(
                'message' => 'Updated successfully.',
                'icon'    => 'check',
                'status'  => '200'
            );
        else:
            $response = array(
                'message' => 'Technical issue!',
                'icon'    => 'alert-triangle',
                'status'  => '404'
            );
        endif;

        echo json_encode($response);
    }

    public function bulk_delete()
    {
        
        if(is_expired()):
             $response = array(
                'message' => 'Your account has expired. Please renew your subscription to access.',
                'icon'    => 'error',
                'status'  => '404'
             );
             echo json_encode($response);die;
        endif;
        
        $ids  = $this->input->post('ids');    // Assuming the AJAX request sends 'ids' as a POST parameter
        $type = $this->input->post('rtype');
        

        $ok = false;
        if (!empty($ids)) {
            
            if($type == 'lead'){
                $result = $this->utility->delete_records('tbl_leads', $ids);
                $ok = true;
            }elseif($type == 'login_history'){
                $result = $this->utility->delete_records('tbl_login_history', $ids);
                $ok = true;
            }else{
                $response = array(
                    'message' => "Our team is working on it",
                    'icon'    => 'error',
                    'status'  => 200,
                );
                echo json_encode($response,true);
                exit();
            }
    
            if ($result > 0 && $ok == true) {
                $response = array(
                    'message' => "Successfully deleted $result records.",
                    'icon' => 'success',
                    'status' => 200,
                );
                echo json_encode($response,true);
                exit();
            } 
            else {
                $response = array(
                    'message' => "No records were deleted.",
                    'icon' => 'error',
                    'status' => 200,
                );
                echo json_encode($response,true);
                exit();
            }
        } else {
            $response = array(
                'message' => "Please select record.",
                'icon'    => 'alert-triangle',
                'status'  => 200,
            );
            echo json_encode($response,true);
            exit();
        }
    }
    
}