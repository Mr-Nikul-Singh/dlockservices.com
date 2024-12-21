<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model{
		
	/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_users($limit, $start) {
		$filter = search_input_security(security($this->input->get('filter')));
	
		$this->db->select('tu.*');
		$this->db->from('tbl_users as tu');

		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('tu.username', $filter);
			$this->db->or_like('tu.email', $filter);
			$this->db->or_like('tu.contact', $filter);
			$this->db->or_like('tu.zip_code', $filter);
			$this->db->or_like('tu.address', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->where_not_in('tu.type', array('admin'));
	
		$this->db->limit($limit, $start);
		$this->db->order_by('tu.id', 'DESC');
		
	
		return $this->db->get()->result_object();
	}
	
	public function get_users_count() {
		$filter = search_input_security(security($this->input->get('filter')));
	
		$this->db->select('tu.*');
		$this->db->from('tbl_users as tu');

		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('tu.username', $filter);
			$this->db->or_like('tu.email', $filter);
			$this->db->or_like('tu.contact', $filter);
			$this->db->or_like('tu.zip_code', $filter);
			$this->db->or_like('tu.address', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->where_not_in('tu.type', array('admin'));

		return $this->db->count_all_results();
	}
	
	public function get_total_users_count($id = null) {
	
		$this->db->select('tu.*');
		$this->db->from('tbl_users as tu');
		
		$this->db->where_not_in('tu.type', array('admin'));
		return $this->db->count_all_results();
	}

	/**
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_users_where(int $id){ 
		$this->db->select('tu.*');
        $this->db->from('tbl_users as tu');
        $this->db->where('tu.id',$id);
		$this->db->where_not_in('tu.type', array('admin'));
        return $this->db->get()->result_object();
    }

    public function update_users($data,$id){
        $this->db->where('id',$id); 
        $user_id = $this->session->user_id;
		$this->db->where_not_in('type', array('admin'));
        $this->db->limit(1);
		$this->db->update('tbl_users',$data);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
    }

	
    public function update_status($data,$id){
		$this->db->where('id',$id); 
		$this->db->where_not_in('type', array('admin'));
        $this->db->limit(1);
		$this->db->update('tbl_users',$data);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
    }
}
?>