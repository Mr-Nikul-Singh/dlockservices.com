<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_Model extends CI_Model {

    public function get_notifications($user_id, $limit = 10) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('tbl_notifications')->result();
    }

    public function add_notification($data) {
        $this->db->insert('tbl_notifications', $data);

        // Send a request to Node.js server for real-time notification
        $this->send_notification($data);
    }

// CodeIgniter Controller method to send notification
    public function send_notification($data){
        $url = 'http://localhost:3000/notify';  // Node.js server URL


        // Initialize CURL
        $ch = curl_init($url);

        // Set the CURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        // Execute CURL request and get the response
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            log_message('error', 'CURL Error: ' . $error);
        } else {
            log_message('info', 'Notification sent successfully');
        }

        // Close the CURL session
        curl_close($ch);
    }


    public function mark_as_read($id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_notifications', ['is_read' => 1]);
    }
}
