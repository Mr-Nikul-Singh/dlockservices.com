<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @param mixed $data
 * @return never
 */
function pre($data = null){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit();
}

function get_limit_message(){
    $CI =& get_instance();
    $limit      = $CI->session->limit;
    $old_limit  = $CI->session->old_limit;
    if($old_limit == 'new'):
        $tempdata = array('icon' => 'check', 'success' => $limit.' records per page limit set successsfully.');
        $CI->session->set_tempdata($tempdata, NULL, 3);
        $CI->session->old_limit = 'old';
    endif;
} 

 /**
  * @param mixed $file
  * @return string[]|string
  * Get filename without extension
  */
 function getName($file){
    return strtolower(pathinfo($file,PATHINFO_FILENAME));
 }

 function check_authentication(){
    if($_SERVER['HTTP_REFERER']){
        return true;
    }         
    else{
        return false;
    }
 }

function slug_generate($title) {
    // Remove special characters and spaces
    $slug = preg_replace('/[^A-Za-z0-9]+/', '-', $title);
    
    // Remove leading and trailing dashes
    $slug = trim($slug, '-');
    
    // Convert to lowercase
    $slug = strtolower($slug);
    
    // Limit the slug to 32 characters
    $slug = substr($slug, 0, 32);
    
    return $slug;
}

function simple_string_format($str){

        // Remove special characters and spaces
        $slug = preg_replace('/[^A-Za-z0-9]+/', ' ', $str);
    
        // Remove leading and trailing dashes
        $slug = trim($slug, '-');
        
        // Convert to lowercase
        $slug = strtolower($slug);
        
        // Limit the slug to 32 characters
        $slug = substr($slug, 0, 32);
        
        return ucwords($slug);
}


function no_record($stack = null){
    if(!empty($stack)):
        echo '<div class="text-primary">'.$stack.'</div>';
    else:
        echo '<div class="text-primary">No records.</div>';
    endif;
}


function uniqe_id($length = 8){
    $uuid = strtolower(md5(uniqid(rand(), true)));
    return substr($uuid, 0, $length); // Use the first 8 characters as the property ID
}

function amount_of_precent($total, $precent) {
    $amount = ($total * $precent) / 100;
    return $amount;
}

function truncate_text($text,$length = 15){
    return strlen($text) > 15 ? substr($text, 0, $length) . '...' : $text;
}

function generate_random_byts($length = 12){
    $bytes = random_bytes($length);
    // Convert the random bytes to a hexadecimal string
    $key = bin2hex($bytes);
    return $key;
}

function url_last_node($url){
    // Use explode to split the URL by "/"
    $parts = explode("/", $url);
    // Get the last part of the URL
    $lastPart = end($parts);
    return $lastPart;

}

function format_phone_number($phoneNumber) {
    // Remove all non-numeric characters
    $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);

    // Check if the phone number is longer than 10 digits
    // if (strlen($phoneNumber) > 10) {
    //     // Remove the first 2 digits and any leading '+'
    //     $phoneNumber = substr($phoneNumber, -10);
    // }
    return $phoneNumber;
}

function generateApiKey()
{
    $segments = [
        bin2hex(random_bytes(4)),
        bin2hex(random_bytes(4)),
        bin2hex(random_bytes(4)),
        bin2hex(random_bytes(4))
    ];

    return implode('-', $segments);
}

function forwardData($url, $data) {
    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

function formatTimeAgo($created_at) {
    $createdTime = new DateTime($created_at);
    $currentTime = new DateTime();
    $interval = $createdTime->diff($currentTime);

    if ($interval->y > 0) {
        return $interval->format('%y years ago');
    } elseif ($interval->m > 0) {
        return $interval->format('%m months ago');
    } elseif ($interval->d > 0) {
        return $interval->format('%d days ago');
    } elseif ($interval->h > 0) {
        return $interval->format('%h hours ago');
    } elseif ($interval->i > 0) {
        return $interval->format('%i minutes ago');
    } else {
        return $interval->format('%s seconds ago');
    }
}


function tooltip($position,$message){
    return 'data-toggle="tooltip" data-placement="'.$position.'" title="'.$message.'"';
}

function e_report(){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

function current_uri(){
    return current_url() . '?' . $_SERVER['QUERY_STRING'];
}

function hide_string($string, $hide_length = 4, $replace_chr = '*', $hide_from = 'S') {
    $string_length = strlen($string);
    
    if ($hide_from === 'S') {
        $visible_part = substr($string, 0, $hide_length);
        $hidden_part = str_repeat($replace_chr, $string_length - $hide_length);
        return $visible_part . $hidden_part;
    } elseif ($hide_from === 'E') {
        $visible_part = substr($string, -$hide_length);
        $hidden_part = str_repeat($replace_chr, $string_length - $hide_length);
        return $hidden_part . $visible_part;
    } elseif ($hide_from === 'SE') {
        $start_length = floor(($string_length - $hide_length) / 2);
        $end_length = $string_length - $start_length - $hide_length;
        $visible_part_start = substr($string, 0, $start_length);
        $visible_part_end = substr($string, -$end_length);
        $hidden_part = str_repeat($replace_chr, $string_length - $start_length - $end_length);
        return $visible_part_start . $hidden_part . $visible_part_end;
    } else {
        return "Invalid hide_from parameter. Please use 'S' for start, 'E' for end, or 'SE' for middle.";
    }
}

// Function to generate a unique invoice ID
function generateInvoiceID() {
    // Get the current date in the format YYYYMMDD
    $date = date('Ymd');

    // Generate a random number between 1000 and 9999
    $randomNumber = mt_rand(1000, 9999438);

    // Combine the date and random number to form the invoice ID
    $invoiceID = $randomNumber;

    return $invoiceID;
}

function siteUrl(){
    return site_url();
}