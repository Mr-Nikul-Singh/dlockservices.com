<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_Model extends CI_Model{
		
	/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_banners($limit,$start){
		
		$filter = search_input_security(security($this->input->get('filter')));
        
        $this->db->select('*');
        $this->db->from('tbl_banners');
		if(!empty($filter)):
			$columns = array(
				'title'   => $filter,
				'status'   => $filter,
			);
			$this->db->or_like($columns,$filter,'both',false);
		endif;	
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        return $this->db->get()->result_object();
    }

	public function get_banners_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));
        
		$this->db->select('*');
        $this->db->from('tbl_banners');
		if(!empty($filter)):
			$columns = array(
				'title'   => $filter,
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
		$this->db->where('created_by',$this->session->user_id);
		$this->db->where('type','staff');
        $this->db->limit(1);
		$this->db->update('tbl_users',$data);
		if($this->db->affected_rows() == 1):
			return true;
		else: 
			return false;
		endif;
	}

	public function delete_record($id){
        $this->db->where('id', $id);
		$this->db->where('created_by',$this->session->user_id);
        $this->db->where('type', 'staff');
        $this->db->limit(1);
        $this->db->delete('tbl_users');
        if ($this->db->affected_rows() == 1) { 
            return true;
        } else { 
            return false;
        }
	}
	
    public function update_status($data,$id){
        $this->db->where('id',$id);
		$this->db->where('created_by',$this->session->user_id);
		$this->db->where('type','staff');
        $this->db->limit(1);
		$this->db->update('tbl_users',$data);
        // die($this->db->last_query());
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
    }

	public function update_settings($data) {
        $query = $this->db->get('tbl_website_settings');
        
        if ($query->num_rows() > 0) {
            // Update settings if they already exist
            $this->db->where('id', 1);
            $this->db->update('tbl_website_settings', $data);
        } else {
            // Insert new settings if none exist
            $this->db->insert('tbl_website_settings', $data);
        }
    }
}
?>