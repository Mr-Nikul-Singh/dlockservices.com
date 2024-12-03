<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_Model extends CI_Model{

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
		
	public function delete_record($id){
		$user_id = $this->session->user_id;
		
		$this->db->where('id',$id);
		$this->db->group_start();
		$this->db->where_in('created_by', get_ids($user_id), false);
		$this->db->group_end();
		$this->db->delete('tbl_invoice');

		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}
}
?> 