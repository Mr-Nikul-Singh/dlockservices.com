<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @return string|array|false
 * detect device information
 */
function detect_client_ip(){
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function os_type(){
    return php_uname('s');
}

/**
 * @return mixed
 * return system info
 */
function detect_system(){
    return $_SERVER['HTTP_USER_AGENT'];
}

/**
 * @return string
 * return csrf security
 */
function csrf__(){
    $ci    =& get_instance();
    $csrf = array(
        'name' => $ci->security->get_csrf_token_name(),
        'hash' => $ci->security->get_csrf_hash()
    );
    return "<input type='hidden' name='{$csrf['name']}' value='{$csrf['hash']}' />";
}

function is_administrator(){
    $ci    =& get_instance();
    if($ci->session->type == 'administrator' && isset($ci->session->user_id)):
        return true;
    else:
        return false;
    endif;
}

function is_admin(){
    $ci    =& get_instance();
    if($ci->session->type == 'admin' && isset($ci->session->user_id)):
        return true;
    else:
        return false;
    endif;
}

function is_retailer(){
    $ci    =& get_instance();
    if($ci->session->type == 'retailer' && isset($ci->session->user_id)):
        return true;
    else:
        return false;
    endif;
}

function is_user_logged_in(){
    $ci    =& get_instance();
    if(isset($ci->session->client_id)):
        return true;
    else:
        return false;
    endif;
}

/**
 * @return string
 * return xxs fliter security
 */
function security($stack){
    return htmlspecialchars(trim(strip_tags($stack)), ENT_QUOTES, 'UTF-8');
    // $ci    =& get_instance();
    // return $ci->security->xss_clean(trim($stack));
}

function xss_security($stack){
    // Remove leading and trailing whitespace
    $data = trim($stack);
    // Remove any existing scripts and tags
    $data = strip_tags($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');    
    return $data;
}

function decode($input){
    return htmlspecialchars_decode($input);
}

function search_input_security($input){
    // Remove any characters other than 'x', 'z', digits 0-9, space, and '@'
    $filtered_input = preg_replace("/[^a-zA-Z0-9 @._-]/", "", $input);
    return $filtered_input;
}

function special_input_security($input){
    // Remove any characters other than 'x', 'z', digits 0-9, space, and '@'
    $filtered_input = preg_replace("/[^a-zA-Z0-9 @._]/", "", $input);
    return $filtered_input;
}

function detect_user_activity(array $input_array = array()){

    $default = array(
        'device_info' => detect_system(),
        'system_ip'   => detect_client_ip(),
    );

    if(!empty($input_array)):
        $data = array_merge($default,$input_array);
    else:
        $data = $default;
    endif;
    
    $CI =& get_instance();
    $CI->root->insert_record("tbl_login_history",$data); 
} 

function is_request_method($allowedMethods = ['GET']) {
    if (!in_array($_SERVER['REQUEST_METHOD'], $allowedMethods)) {
        header("HTTP/1.0 405 Method Not Allowed");
        echo "Error: Request method is not allowed for this resource.";
        exit();
    }
}

function encrypt_numbers($string) {
    $replacementArray = [
        '0' => 'A3',
        '1' => 'B1',
        '2' => 'C3',
        '3' => 'D1',
        '4' => 'E7',
        '5' => 'F3',
        '6' => 'G0',
        '7' => 'H1',
        '8' => 'I7',
        '9' => '8J'
    ];

    // Use strtr function to replace numbers with corresponding characters
    $encryptedString = strtr($string, $replacementArray);
    
    return $encryptedString;
}


function decrypt_numbers($string) {
    $replacementArray = [
        'A3' => '0',
        'B1' => '1',
        'C3' => '2',
        'D1' => '3',
        'E7' => '4',
        'F3' => '5',
        'G0' => '6',
        'H1' => '7',
        'I7' => '8',
        '8J' => '9'
    ];

    // Use strtr function to replace characters with original numbers
    $decryptedString = strtr($string, $replacementArray);
     // Check if any characters were not decrypted (did not match in the replacement array)
    if (preg_match('/[A-Z]\d/', $decryptedString)) {
        return false;
    }
    
    return $decryptedString;
}

function get_admin_of_user($user_id){
    $ci =& get_instance();
    $ci->load->database();

    // Prepare the SQL query using prepared statements
    $sql = "
        WITH RECURSIVE UserHierarchy AS (
            SELECT id, created_by, username, type
            FROM tbl_users
            WHERE id = ?
            
            UNION
            
            SELECT u.id, u.created_by, u.username, u.type
            FROM tbl_users u
            JOIN UserHierarchy h ON u.id = h.created_by
        )
        SELECT id, created_by, username, type
        FROM UserHierarchy
        WHERE id != 1 AND type = 'admin'
    ";

    // Execute the query with parameters
    $query = $ci->db->query($sql, array($user_id));

    // Get the result objects
    $result_objects = $query->result_object();

    $ids_array = array_map(function($obj) {
        return $obj->id;
    }, $result_objects);

    // Merge the arrays and remove duplicates
    $result_ids = array_unique(array_merge($ids_array));

    return $result_ids;
}


// GET PARENTS OF USER  exmple user 2 ne 134 banaya 134 ne 137
function get_revers_id($user_id,$new_id = null) {
    $ci =& get_instance();
    $ci->load->database();

    $query = $ci->db->query("
        WITH RECURSIVE UserHierarchy AS (
            SELECT id, created_by, username, status
            FROM tbl_users
            WHERE id = $user_id AND status = '1'
            
            UNION
            
            SELECT u.id, u.created_by, u.username, u.status
            FROM tbl_users u
            JOIN UserHierarchy h ON u.id = h.created_by
        )
        SELECT id, created_by, username, status
        FROM UserHierarchy where id != 1 AND status = '1'
    ");
    
    $result_objects = $query->result_object();

    $ids_array = array_map(function($obj) {
        return $obj->id;
    }, $result_objects);

    if ($new_id !== null) {
        $ids_array[] = $new_id;
    }

    // Merge the arrays and remove duplicates
    $result_ids = array_unique(array_merge($ids_array));

    return $result_ids;
    
}

// Get Child IDS
function get_ids($user_id, $new_id = null){
    $ci =& get_instance();

    // Prepare the SQL query using prepared statements
    $sql = "(SELECT id
                FROM (SELECT * FROM tbl_users) AS tbl_users,
                (SELECT @pv := ?) AS initialisation
                WHERE FIND_IN_SET(created_by, @pv) > 0
                AND @pv := CONCAT(@pv, ',', id))
            UNION
            (SELECT id
                FROM tbl_users
                WHERE id = ?)";

    // Execute the query with parameters
    $query = $ci->db->query($sql, array($user_id, $user_id));

    // Get the result objects
    $result_objects = $query->result_object();

    // Extract the IDs from the result objects
    $ids_array = array_map(function($obj) {
        return $obj->id;
    }, $result_objects);

    // Add the new ID if provided
    if ($new_id !== null) {
        $ids_array[] = $new_id;
    }

    // Merge the arrays and remove duplicates
    $result_ids = array_unique($ids_array);

    return $result_ids;
}

// get Admin Account Level

function get_account_level() {
    $ci =& get_instance();
    $adminUser = get_admin_of_user($ci->session->user_id)[0];
    
    $query = "WITH RECURSIVE UserHierarchy AS ( 
                    SELECT id, created_by, 1 AS Level 
                    FROM tbl_users 
                    WHERE id = '$adminUser'
                UNION ALL 
                    SELECT u.id, u.created_by, uh.Level + 1 
                    FROM tbl_users u 
                    INNER JOIN UserHierarchy uh ON u.created_by = uh.id 
            ) 
            SELECT MAX(Level) AS MaxLevel 
            FROM UserHierarchy";
            
    $query = $ci->db->query($query);
    $result = $query->row()->MaxLevel;
    return $result;
}


/**
 * Check if the user has the required permissions.
 *
 * @param string $has The module or functionality to check.
 * @param mixed $permission The list of permissions to check (array or string).
 * @param bool $return_response Whether to return a JSON response on permission denied.
 * @return void
 */
function has_permission(string $has, mixed $permission, bool $return_response = false) {
    return;
}

/**
 * Check if the current request method matches the expected method(s) and optionally validate the API key.
 *
 * @param mixed $expectedMethods String or array of HTTP methods to check against.
 * @param bool $checkApiKey Optional. If true, also validate the API key.
 * @return bool True if the current request method matches any of the $expectedMethods and API key is valid (if checked), false otherwise.
 */
function is_method($expectedMethods, $checkApiKey = false) {
    $CI =& get_instance();
    $currentMethod = strtolower($CI->input->method());

    // Convert $expectedMethods to lowercase if it's a string for case-insensitive comparison
    if (!is_array($expectedMethods)) {
        $expectedMethods = [strtolower($expectedMethods)];
    } else {
        $expectedMethods = array_map('strtolower', $expectedMethods);
    }

    // Check if current method is in the expected methods array
    if (!in_array($currentMethod, $expectedMethods)) {
        // If method not allowed, return an error response
        returnError('Method not allowed. Use ' . implode(' or ', $expectedMethods) . ' method for this request.', 405);
        exit; // Stop further execution
    }

    // If API key check is required
    if ($checkApiKey == true) {
        // Retrieve the API key from the request headers
        $apiKey = $CI->input->get_request_header('API-Key');
        // Check if the API key is provided and valid
        if (!is_valid_api_key($apiKey)) {
            returnError('Invalid or missing API key.', 401);
            exit; // Stop further execution
        }
    }

    return true;
}

/**
 * Helper function to return an error response in JSON format.
 *
 * @param string $message The error message to include in the response.
 * @param int $statusCode The HTTP status code for the error response.
 */
function returnError($message, $statusCode) {
    $response = ['status' => 'error', 'message' => $message];
    $CI =& get_instance();
    echo $CI->output
        ->set_content_type('application/json')
        ->set_status_header($statusCode)
        ->set_output(json_encode($response))->final_output;
}

/**
 * Check if the provided API key is valid.
 *
 * @param string $apiKey The API key to validate.
 * @return bool True if the API key is valid, false otherwise.
 */
function is_valid_api_key($apiKey) {
    $CI =& get_instance();
    // Assume the valid API key is stored in the config file
    $validApiKey = $CI->config->item('api_key');
    return $apiKey === $validApiKey;
}