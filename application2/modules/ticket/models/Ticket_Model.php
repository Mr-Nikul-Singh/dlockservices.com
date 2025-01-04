<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_Model extends CI_Model{

		/** 
	 * @param mixed $limit
	 * @param mixed $start
	 * @param mixed $where
	 * @return mixed
	 */
    public function get_tickets($limit,$start){
		  
		$filter = search_input_security(security($this->input->get('filter')));
		
		$user_id = $this->session->user_id;

		$this->db->select('*');
		$this->db->from('tbl_tickets');
		// $this->db->group_start();
		// $this->db->where_in('created_by', get_ids($user_id), false);
		// $this->db->group_end();


		if (!empty($filter)) {
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('ticket_id', $filter);
			$this->db->or_like('subject', $filter);
			$this->db->or_like('status', $filter);
			$this->db->or_like('priority', $filter);
			$this->db->or_like('category', $filter);
			$this->db->group_end(); // End grouping the search conditions
		}

		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result_object();

    }

	public function get_tickets_count(){
		
		$filter = search_input_security(security($this->input->get('filter')));		
		$user_id = $this->session->user_id;

		$this->db->select('*');
        $this->db->from('tbl_tickets');

		// $this->db->group_start();
		// $this->db->where_in('created_by', get_ids($user_id), false);
		// $this->db->group_end();

		if(!empty($filter)):
			$this->db->group_start(); // Start grouping the search conditions
			$this->db->like('ticket_id', $filter);
			$this->db->or_like('subject', $filter);
			$this->db->or_like('status', $filter);
			$this->db->or_like('priority', $filter);
			$this->db->or_like('category', $filter);
			$this->db->group_end(); // End grouping the search conditions
		endif;
		return $this->db->count_all_results();
	}
		
	public function delete_record($id){
		$user_id = $this->session->user_id;
		// $this->db->group_start();
		// $this->db->where_in('created_by', get_ids($user_id), false);
		// $this->db->group_end();

		$this->db->where('id',$id);
		$this->db->delete('tbl_tickets');

		if($this->db->affected_rows() == 1): 
			return true;
		else: 
			return false;
		endif;
	}

	public function get_ticket_by_id($ticket_id) {
        return $this->db->get_where('tbl_tickets', array('id' => $ticket_id))->row();
    }

	public function get_replies($ticket_id) {
		$this->db->select('tbl_ticket_replies.*, tbl_users.full_name AS replied_by_name, tbl_users.email AS replied_by_email');
		$this->db->from('tbl_ticket_replies');
		$this->db->join('tbl_users', 'tbl_ticket_replies.replied_by = tbl_users.id', 'left');
		$this->db->where('tbl_ticket_replies.ticket_id', $ticket_id);
		return $this->db->get()->result();
	}
	
}
?> 