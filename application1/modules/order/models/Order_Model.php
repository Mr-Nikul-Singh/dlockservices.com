<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model{
		
	/** 
	 * @param mixed $limit
	 * @param mixed $start 
	 * @param mixed $where
	 * @return mixed
	 */
	public function get_orders($limit, $start) {

		$filter = search_input_security(security($this->input->get('filter')));
		$user_id = $this->session->user_id;
		$this->db->select('tu.full_name as username, tu.contact, to.*');
		$this->db->from('tbl_users as tu');
		$this->db->join('tbl_partial_orders as to', 'to.created_by = tu.id');
		
		$UserID = $this->input->get('user_id');
		if(!empty($UserID)){
			$this->db->where('to.created_by',$UserID);
		}
		// Exclude admin type users
		// $this->db->where_not_in('tu.type', ['admin']);
		
		if (!empty($filter)) { 
			$this->db->group_start();
			$this->db->like('tu.full_name', $filter);
			$this->db->or_like('to.order_id', $filter);
			$this->db->or_like('tu.email', $filter);
			$this->db->or_like('tu.contact', $filter);
			$this->db->or_like('tu.zip_code', $filter);
			$this->db->or_like('tu.address', $filter);
			$this->db->or_like('to.email', $filter);
			$this->db->or_like('to.fullName', $filter);
			$this->db->or_like('to.phone', $filter);
			$this->db->or_like('to.city', $filter);
			$this->db->or_like('to.state', $filter);
			$this->db->or_like('to.cpuCores', $filter);
			$this->db->or_like('to.ramSize', $filter);
			$this->db->or_like('to.storage', $filter);
			$this->db->or_like('to.os', $filter);
			$this->db->or_like('to.serverType', $filter);
			$this->db->group_end();
		}
	
		$this->db->limit($limit, $start);
		$this->db->order_by('to.id', 'DESC');
		
		return $this->db->get()->result_object();
	}
	
	
	public function get_donor_count() {

		$filter = search_input_security(security($this->input->get('filter')));
		$user_id = $this->session->user_id;
		$this->db->select('tu.*, tu.full_name as username, tu.contact, to.*');
		$this->db->from('tbl_users as tu');
		$this->db->join('tbl_partial_orders as to', 'to.created_by = tu.id', 'inner');

		$UserID = $this->input->get('user_id');
		if(!empty($UserID)){
			$this->db->where('to.created_by',$UserID);
		}
		// Exclude admin type users
		// $this->db->where_not_in('tu.type', ['admin']);
		
		if (!empty($filter)) { 
			$this->db->group_start();
			$this->db->like('tu.full_name', $filter);
			$this->db->or_like('tu.email', $filter);
			$this->db->or_like('to.order_id', $filter);
			$this->db->or_like('tu.contact', $filter);
			$this->db->or_like('tu.zip_code', $filter);
			$this->db->or_like('tu.address', $filter);
			$this->db->or_like('to.email', $filter);
			$this->db->or_like('to.fullName', $filter);
			$this->db->or_like('to.phone', $filter);
			$this->db->or_like('to.city', $filter);
			$this->db->or_like('to.state', $filter);
			$this->db->or_like('to.cpuCores', $filter);
			$this->db->or_like('to.ramSize', $filter);
			$this->db->or_like('to.storage', $filter);
			$this->db->or_like('to.os', $filter);
			$this->db->or_like('to.serverType', $filter);
			$this->db->group_end();
		}
		return $this->db->count_all_results();
	}
	
    public function update_status($data,$id){
		$this->db->where('id',$id);
		$this->db->where_not_in('type',['admin']);
        $this->db->limit(1);
		$this->db->update('tbl_users',$data);
		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
    }
	
	public function delete_record($id){
		$user_id = $this->session->user_id;
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_donor_activities');

		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}

			/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_payment_history($limit,$start){
		 
		$filter = search_input_security(security($this->input->get('filter')));

		$user_id = $this->session->user_id;
		
		$this->db->select('tbl_online_payments.*, tbl_subscriptions.plan_name');
		$this->db->from('tbl_online_payments');
		$this->db->join('tbl_subscriptions','tbl_online_payments.plan_id = tbl_subscriptions.id','LEFT');
		$this->db->group_start();
		$this->db->where_in('tbl_online_payments.created_by', get_ids($user_id), false);
		$this->db->group_end();

		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('tbl_online_payments.payment_id', $filter);
			$this->db->or_like('tbl_online_payments.order_id', $filter);
			$this->db->or_like('tbl_online_payments.amount', $filter);
			$this->db->or_like('tbl_online_payments.currency', $filter);
			$this->db->or_like('tbl_online_payments.payment_status', $filter);
			$this->db->or_like('tbl_online_payments.plan_status', $filter);
			$this->db->or_like('tbl_online_payments.payment_method', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->limit($limit, $start);
		$this->db->order_by('tbl_online_payments.id', 'desc');
		return $this->db->get()->result_object();

    }

	public function get_payment_history_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));
		
		$user_id = $this->session->user_id;

		$this->db->select('tbl_online_payments.*, tbl_subscriptions.plan_name');
		$this->db->from('tbl_online_payments');
		$this->db->join('tbl_subscriptions','tbl_online_payments.plan_id = tbl_subscriptions.id','LEFT');
		$this->db->group_start();
		$this->db->where_in('tbl_online_payments.created_by', get_ids($user_id), false);
		$this->db->group_end();

		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('tbl_online_payments.payment_id', $filter);
			$this->db->or_like('tbl_online_payments.order_id', $filter);
			$this->db->or_like('tbl_online_payments.amount', $filter);
			$this->db->or_like('tbl_online_payments.currency', $filter);
			$this->db->or_like('tbl_online_payments.payment_status', $filter);
			$this->db->or_like('tbl_online_payments.plan_status', $filter);
			$this->db->or_like('tbl_online_payments.payment_method', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		return $this->db->count_all_results();
	}

	public function get_payment_invoice($id){
		
		$user_id = $this->session->user_id;
		$this->db->select('tbl_online_payments.*, tbl_subscriptions.plan_name,tbl_users.username');
		$this->db->from('tbl_online_payments');
		$this->db->join('tbl_subscriptions','tbl_online_payments.plan_id = tbl_subscriptions.id','LEFT');
		$this->db->join('tbl_users','tbl_online_payments.created_by = tbl_users.id','LEFT');
        $this->db->where('tbl_online_payments.id',$id);
		$this->db->group_start();
		$this->db->where_in('tbl_online_payments.created_by', get_ids($user_id), false);
		$this->db->group_end();
		return $this->db->get()->result_object();
	}
}
?>