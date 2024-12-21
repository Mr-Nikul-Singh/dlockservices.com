<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility_Model extends CI_Model{
		
	/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
	public function get_record_by_limit($tbl_name,$limit,$start,$order_by = 'DESC'){
		$query = "SELECT * FROM $tbl_name ORDER BY id $order_by LIMIT $start,$limit";
        $query = $this->db->query($query);
        return $query->result_object();
    }

	/**
	 * @param mixed $tbl_name
	 * @param mixed $where
	 * @return mixed
	 */ 
    public function get_record($tbl_name,$where = '',$column = '*',$order_by = 'desc|id',$type = 'object'){
		$ordering = explode('|',$order_by);
		$order__by = (!empty($ordering[0])) ? $ordering[0] : 'desc';
		$order__by_column = (!empty($ordering[1])) ? $ordering[1] : 'id';
		$columns = explode('|',$column);
			$this->db->select($columns);
			$this->db->from($tbl_name);
			if(!empty($where)):
				$this->db->where($where);
			endif;
			$this->db->order_by($order__by_column,$order__by);
			$query = $this->db->get();
				if($type === 'array'):
					return $query->result_array();
				elseif($type === 'object'):
					return $query->result_object();
				endif;
    }

	/**
	 * @param mixed $tbl_name
	 * @return mixed
	 */
	public function total_rows($tbl_name){
		return $this->db->count_all($tbl_name); 
    } 

	/**
	 * @param mixed $tbl_name
	 * @return mixed 
	*/
	public function describe($tbl_name,$column = null){
		$columns = explode('|', $column);
		if(!empty($column)):
			$query = $this->db->query("DESCRIBE $tbl_name")->result_array();
			foreach($query as $row) {
				if(in_array($row['Field'], $columns)) {
					$result[] = $row;
				}
			}
			return $result;
		else:
			$result = $this->db->query("DESCRIBE $tbl_name")->result_array();
			return $result;
		endif;
	}

	/**
	 * @param mixed $where
	 * @return mixed
	 */
	public function rows_where($tbl_name,$where){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->where($where);
		return $this->db->count_all_results();
	}
	
	/**
	 * @param mixed $tbl_name
	 * @param mixed $data
	 * @return void
	 */
	public function insert_record($tbl_name,$data){
		$this->db->insert($tbl_name,$data);
	}
	
	/**
	 * @param mixed $tbl_name
	 * @param mixed $data 
	 * @param mixed $id
	 * @return void
	 */ 
	public function update_record($tbl_name,$data,$id)
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->update($tbl_name,$data);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}
	
	/**
	 * @param mixed $tablename
	 * @param mixed $id
	 * @return void
	 */
	function delete_record($tbl_name,$id)
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		// $this->db->where('user_id',$this->session->user_id);
		$this->db->delete($tbl_name);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}

	function delete_records($tbl_name, $ids)
	{
		$this->db->where_in('id', $ids);
		$this->db->where('created_by', $this->session->user_id);
		$this->db->delete($tbl_name);
		return $this->db->affected_rows();
	}


	public function get_parent_menus($limit,$start){
        $this->db->select('*');
        $this->db->from('tbl_menus');
        $this->db->where('parent_id', NULL);
        $this->db->limit($limit, $start);
        $this->db->order_by('id','asc');
        return $this->db->get()->result_object();
    }

	public function get_parent_menus_count(){
        $this->db->select('*');
        $this->db->from('tbl_menus');
        $this->db->where('parent_id', NULL);
        return $this->db->count_all_results();
    }
}