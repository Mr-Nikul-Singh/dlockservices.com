<?php
class Api_Model extends CI_Model
{

	/**
	 * @param mixed $phone
	 * @param mixed $password
	 * @param mixed $username
	 * @return bool|void
	 */
	public function login_valid($username,$password){
		
		$query = $this->db->where('email', $username)
                 ->where('status', '1')
                 ->get('tbl_users');

		$login_row = $query->row();
		if(!empty($login_row->password)):

			if(password_verify($password,$login_row->password)): 
				return $login_row;
			else: 
				return FALSE;    
			endif;

		endif;   
	}

	/**
	 * @param mixed $mobile
	 * @return bool|void
	 */
	public function login_with_number($mobile){
		
		$query = $this->db->where('mobile_no', $mobile)
                //  ->where('account_status', 'active')
                 ->where('is_deleted', '0')
                 ->get('tbl_users');
		$login_row = $query->row();
		if(!empty($login_row->mobile_no)):
			return $login_row;
		else: 
			return FALSE;    
		endif; 
	}

}