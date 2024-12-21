<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_Model extends CI_Model{

		/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_blog($limit,$start){
		 
		$filter = search_input_security(security($this->input->get('filter')));

		$user_id = $this->session->user_id;

		$this->db->select('tb.*,tbc.name');
		$this->db->from('tbl_blog as tb');
        $this->db->join('tbl_category as tbc','tb.category_id = tbc.id','LEFT');
		
		// $this->db->group_start();
		// $this->db->where_in('tb.created_by', get_ids($user_id), false);
		// $this->db->group_end();

		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('tb.blog_title', $filter);
			$this->db->or_like('tb.slug_url', $filter);
			$this->db->or_like('tb.author', $filter);
			$this->db->or_like('tb.tags', $filter);
			$this->db->or_like('tb.status', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result_object();

    }

	public function get_blog_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));
		
		$user_id = $this->session->user_id;
        $this->db->select('tb.*,tbc.name');
		$this->db->from('tbl_blog as tb');
        $this->db->join('tbl_category as tbc','tb.category_id = tbc.id','LEFT');
		
		// $this->db->group_start();
		// $this->db->where_in('tb.created_by', get_ids($user_id), false);
		// $this->db->group_end();

		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('tb.blog_title', $filter);
			$this->db->or_like('tb.slug_url', $filter);
			$this->db->or_like('tb.author', $filter);
			$this->db->or_like('tb.tags', $filter);
			$this->db->or_like('tb.status', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		return $this->db->count_all_results();
	}

	
    public function update_blog($data,$id){
        $this->db->where('id',$id); 
        // $user_id = $this->session->user_id;
		// $this->db->group_start();
		// $this->db->or_where_in('created_by', get_ids($user_id), false);
		// $this->db->group_end();
        $this->db->limit(1);
		$this->db->update('tbl_blog',$data);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
    }
		
	public function delete_record($id){
		$user_id = $this->session->user_id;
		
		$this->db->where('id',$id);
		// $this->db->group_start();
		// $this->db->where_in('created_by', get_ids($user_id), false);
		// $this->db->group_end();
		$this->db->delete('tbl_blog');

		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}
}