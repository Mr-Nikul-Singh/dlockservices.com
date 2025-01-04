<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Model extends CI_Model{


	/**
	 * @param string $tbl_name
	 * @param string|null $sum_column
	 * @param array $where_conditions
	 * @return mixed
	 */
	public function get_rows($tbl_name, $sum_column = null, $where_conditions = []){
		if ($sum_column) {
			// Summing the specified column
			$this->db->select_sum($sum_column);
			if (!empty($where_conditions)) {
				$this->db->where($where_conditions);
			}
			$query = $this->db->get($tbl_name);
			return $query->row()->$sum_column;
		} else {
			// Counting rows
			if (!empty($where_conditions)) {
				$this->db->where($where_conditions);
			}
			return $this->db->count_all_results($tbl_name); 
		}
	}

		
	/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
	public function get_record_by_limit($tbl_name,$limit,$start){
		$query = "SELECT * FROM $tbl_name ORDER BY id desc LIMIT $start,$limit";
        $query = $this->db->query($query);
        return $query->result_object();
    }

	/**
	 * @param mixed $tbl_name
	 * @param mixed $where
	 * @param string $column
	 * @param string $order_by
	 * @param string $type
	 * @param int $limit
	 * @param int $offset
	 * @return mixed
	 */
	public function get_record($tbl_name, $where = '', $column = '*', $order_by = 'desc|id', $type = 'object', $limit = null, $offset = 0) {
		$ordering = explode('|', $order_by);
		$order__by = (!empty($ordering[0])) ? $ordering[0] : 'desc';
		$order__by_column = (!empty($ordering[1])) ? $ordering[1] : 'id';
		$columns = explode('|', $column);

		$this->db->select($columns);
		$this->db->from($tbl_name);
		if (!empty($where)):
			$this->db->where($where);
		endif;
		$this->db->order_by($order__by_column, $order__by);
		if (!is_null($limit)):
			$this->db->limit($limit, $offset);
		endif;
		$query = $this->db->get();
		if ($type === 'array'):
			return $query->result_array();
		elseif ($type === 'object'):
			return $query->result_object();
		endif;
	}

	
    public function if_exist($tbl_name, $where = null) {
		$this->db->or_where($where);
        $query = $this->db->get($tbl_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
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
	public function insert_record($tbl_name, $data) {
		$this->db->insert($tbl_name, $data);
		return $this->db->insert_id();
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

	public function update($tbl_name,$data,$where,$limit = 1)
	{
		$this->db->where($where);
		$this->db->limit($limit);
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
		// $this->db->where('user_id',$this->session->user_id);
		$this->db->delete($tbl_name);
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
	function delete($tbl_name,$where)
	{
		$this->db->where($where);
		$this->db->delete($tbl_name);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}
}