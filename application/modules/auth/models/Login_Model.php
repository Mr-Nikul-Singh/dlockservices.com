<?php
class Login_Model extends CI_Model
{
	
	/**
	 * @param mixed $phone
	 * @param mixed $password
	 * @param mixed $username
	 * @return bool|void
	 */
	public function login_valid($username,$password,$secret_pin){
		
		$query = $this->db->where('email', $username)
                 ->where('status', '1')
                 ->where('account_status', 'active')
				 ->where('secret_pin', $secret_pin)
                //  ->where('type','admin')
                 ->get('tbl_users');

		$login_row = $query->row();
		if(!empty($login_row->password)):

			if(password_verify($password,$login_row->password)): 
				$token   = "422342SLFJKSL81203810ABCDEFGHIJKLM1234567890NOPQRSTUVXYZ";
				$newdata = array(
					'pi_token'        => substr($token,8,6),
					'user_id'         => $login_row->id,
					'email'           => $login_row->email,
					'username'        => $login_row->username,
					'profile_picture' => $login_row->profile_picture,
					'logo_picture'    => $login_row->logo_picture,
					'first_name'      => $login_row->first_name,
					'last_name'       => $login_row->last_name,
					'type'            => $login_row->type,
					'contact'         => $login_row->contact,
					'customer_id'     => 'DEMO380',
				);

				$this->session->set_userdata($newdata);
				return TRUE;
			else: 
				return FALSE;    
			endif;

		endif;   
	}

	public function login_valid_front_end($username,$password){
		
		$query = $this->db->where('email', $username)
                 ->where('status', '1')
                 ->where('account_status', 'active')
                 ->where('type','user')
                 ->get('tbl_users');

		$login_row = $query->row();
		if(!empty($login_row->password)):

			if(password_verify($password,$login_row->password)): 
				$token   = "422342SLFJKSL81203810ABCDEFGHIJKLM1234567890NOPQRSTUVXYZ";
				$newdata = array(
					'pi_token'     => substr($token,8,6),
					'client_id'    => $login_row->id,
					'email'        => $login_row->email,
					'username'     => $login_row->username,
					'profile'      => $login_row->profile_picture,
					'logo_picture' => $login_row->logo_picture,
					'first_name'   => $login_row->first_name,
					'last_name'    => $login_row->last_name,
					'user_type'    => $login_row->type,
					'contact'      => $login_row->contact,
					'customer_id'  => 'DEMO380',
				);
				
				$this->session->set_userdata($newdata); 
				return TRUE;
			else: 
				return FALSE;    
			endif;

		endif;   
	}
	
	public function get_login_status($username){
		$query = $this->db->where('email', $username)
		->where('type','administrator')
		->get('tbl_users')->result_object()[0]->account_status ?? '';
		return $query;
	}

	/**
	 * @return string|void
	 */
	public function change_password(){

        $old_password = $this->input->post('old_password');

		$query = $this->db->where(['id' => $this->session->user_id,'status' => '1','type' => $this->session->type])->get('tbl_users');
	
		$login_row = $query->row();
        if(!empty($old_password)):
            if(!empty($login_row->password)): 
                if(password_verify($old_password,$login_row->password)):  
                    return 'TRUE';
                else: 
                    return 'Current password could not verify!';    
                endif;
            endif; 
        endif;
    }
} 
?>