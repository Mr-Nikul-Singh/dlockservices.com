<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model{

		/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_categories($limit,$start){
		 
		$filter = search_input_security(security($this->input->get('filter')));

		$this->db->select('*');
		$this->db->from('tbl_category');

		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('name', $filter);
			$this->db->or_like('description', $filter);
			$this->db->or_like('status', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result_object();

    }

	public function get_categories_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));
	
		$this->db->select('*');
        $this->db->from('tbl_category');

		if(!empty($filter)):
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('name', $filter);
			$this->db->or_like('description', $filter);
			$this->db->or_like('status', $filter);
			$this->db->group_end(); // End grouping the search conditions
		endif;
		return $this->db->count_all_results();
	}

	
    public function update_category($data,$id){
        $this->db->where('id',$id); 
        $this->db->limit(1);
		$this->db->update('tbl_category',$data);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
    }
		
	public function delete_record($id){
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_category');

		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}
}