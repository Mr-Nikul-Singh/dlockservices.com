<?php
function send____mail($to,$subject,$message){
        $CI =& get_instance();
		$config['protocol']     = 'smtp';
		$config['smtp_host']    = 'mail.racoonpy.com';
		$config['smtp_port']    = 587;
		$config['smtp_timeout'] = '20';
		$config['smtp_user']    = 'no-reply@racoonpy.com';
		$config['smtp_pass']    = 'Iz(A+usr?(iX';
		$config['charset']      = 'utf-8';
		$config['newline']      = "\r\n";
		$config['mailtype']     = 'html';
		$config['validation']   = TRUE;  

        $CI->email->initialize($config);
        $CI->email->from('no-reply@racoonpy.com', 'No-reply');
        $CI->email->to($to); 

        $CI->email->subject($subject);
        $CI->email->message($message);
		if($CI->email->send()){
			sleep(3);
			return true;
		}else{
			return false;
		}
		// echo $CI->email->print_debugger();
	}

	function contact_mail($to,$subject,$message){
        $CI =& get_instance();
		$config['protocol']     = 'smtp';
		$config['smtp_host']    = 'mail.racoonpy.com';
		$config['smtp_port']    = 587;
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'no-reply@racoonpy.com';
		$config['smtp_pass']    = 'Iz(A+usr?(iX';
		$config['charset']      = 'utf-8';
		$config['newline']      = "\r\n";
		$config['mailtype']     = 'html';
		$config['validation']   = TRUE;  

        $CI->email->initialize($config);
        $CI->email->from('no-reply@racoonpy.com', 'Contact');
        $CI->email->to($to); 

        $CI->email->subject($subject);
        $CI->email->message($message);  

        $CI->email->send();

        // echo $CI->email->print_debugger();
	}

	function system_email($default = null){
		if(!empty($default) || $default != null){
			return $default;
		}else{
			return 'mrnikulsingh@gmail.com';
		}
	}
	
	function isMailServerReachable($mailServer, $port)
	{
		// Set a timeout for the connection attempt
		$timeout = 5; // seconds

		// Open a network connection to the mail server
		$socket = @fsockopen($mailServer, $port, $errno, $errstr, $timeout);

		// Check if the connection was successful
		if ($socket) {
			fclose($socket);
			return true; // Mail server is reachable
		} else {
			return false; // Mail server is not reachable
		}
}