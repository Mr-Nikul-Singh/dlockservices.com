<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_Model extends CI_Model{

		/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_history($limit,$start){
		 
		$filter = search_input_security(security($this->input->get('filter')));

		$user_id = $this->session->user_id;

		$this->db->select('*');
		$this->db->from('tbl_login_history');
		$this->db->group_start();
		$this->db->where_in('created_by', get_ids($user_id), false);
		$this->db->group_end();


		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('error_type', $filter);
			$this->db->or_like('user_type', $filter);
			$this->db->or_like('email', $filter);
			$this->db->or_like('status', $filter);
			$this->db->or_like('device_info', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result_object();

    }

	public function get_history_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));
		
		$user_id = $this->session->user_id;

		$this->db->select('*');
        $this->db->from('tbl_login_history');

		$this->db->group_start();
		$this->db->where_in('created_by', get_ids($user_id), false);
		$this->db->group_end();

		if(!empty($filter)):
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('error_type', $filter);
			$this->db->or_like('user_type', $filter);
			$this->db->or_like('email', $filter);
			$this->db->or_like('status', $filter);
			$this->db->or_like('device_info', $filter);
			$this->db->group_end(); // End grouping the search conditions
		endif;
		return $this->db->count_all_results();
	}
		
	public function delete_record($id){
		$user_id = $this->session->user_id;
		$this->db->group_start();
		$this->db->where_in('created_by', get_ids($user_id), false);
		$this->db->group_end();

		$this->db->where('id',$id);
		$this->db->delete('tbl_login_history');

		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}
}