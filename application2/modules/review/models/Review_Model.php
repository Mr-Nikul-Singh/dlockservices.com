<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_Model extends CI_Model{
		
	/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_reviews($limit,$start){
		
		$filter = search_input_security(security($this->input->get('filter')));
        
        $this->db->select('*');
        $this->db->from('tbl_reviews');
		if(!empty($filter)):
			$columns = array(
				'reviewer_name'   => $filter,
				'status'   => $filter,
			);
			$this->db->or_like($columns,$filter,'both',false);
		endif;	
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        return $this->db->get()->result_object();
    }

	public function get_reviews_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));
        
		$this->db->select('*');
        $this->db->from('tbl_reviews');
		if(!empty($filter)):
			$columns = array(
				'reviewer_name'   => $filter,
				'status'   => $filter,
			);
			$where = $this->db->or_like($columns,$filter,'both',false);
		endif;
		return $this->db->count_all_results();
	}

    /**
	 * @param mixed $tbl_name
	 * @param mixed $data 
	 * @param mixed $id
	 * @return void
	 */ 
	public function update_record($data,$id)
	{
		$this->db->where('id',$id);
        $this->db->limit(1);
		$this->db->update('tbl_reviews',$data);
		if($this->db->affected_rows() == 1):
			return true;
		else: 
			return false;
		endif;
	}

	public function delete_record($id){
        $this->db->where('id', $id);
        $this->db->limit(1);
        $this->db->delete('tbl_users');
        if ($this->db->affected_rows() == 1) { 
            return true;
        } else { 
            return false;
        }
	}
}
?>