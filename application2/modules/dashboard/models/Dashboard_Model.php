<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model{

    /**
	 * @return mixed
	 */
	public function get_total_donors(){

		$this->db->select('*');
		$this->db->from('tbl_users');
        $this->db->where_not_in('type',['admin']);
		return $this->db->count_all_results();
	}
    
    /**
	 * @return mixed
	 */
	public function get_login_history(){
		$user_id = $this->session->user_id;

		$this->db->select('*');
		$this->db->from('tbl_login_history');
		$this->db->group_start();
		$this->db->where_in('created_by', get_ids($user_id), false);
		$this->db->group_end();
		return $this->db->count_all_results();
	}
    
    /**
	 * @return mixed
	 */
	public function get_total_events(){
		$this->db->select('*');
		$this->db->from('tbl_events');
		return $this->db->count_all_results();
	}
    
    /**
	 * @return mixed
	 */
	public function get_blood_requests(){
		$this->db->select('*');
		$this->db->from('tbl_blood_requests');
		return $this->db->count_all_results();
	}
}