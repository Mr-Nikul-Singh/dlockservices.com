<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Model extends CI_Model{

		/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_contacts($limit,$start){
		
		$filter = search_input_security(security($this->input->get('filter')));
		
		$this->db->select('*');
		$this->db->from('tbl_contacts');
		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('name', $filter);
			$this->db->or_like('email', $filter);
			$this->db->or_like('subject', $filter);
			$this->db->or_like('message', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result_object();

    }

	public function get_contacts_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));
		
		if(!empty($filter)):
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('name', $filter);
			$this->db->or_like('email', $filter);
			$this->db->or_like('subject', $filter);
			$this->db->or_like('message', $filter);
			$this->db->group_end(); // End grouping the search conditions
		endif;

		$this->db->select('*');
        $this->db->from('tbl_contacts');
		return $this->db->count_all_results();
	}
		
	public function delete_record($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_contacts');
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}
}