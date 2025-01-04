<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** 
 * @param mixed $type
 * @return bool
 */
function get_setting($type){
    $ci    = &get_instance();
    $query = $ci->db->where(['mode' => $type])->get('tbl_settings');
    return $query->result_array()[0];
}

function get_meta($column) {
    $ci = &get_instance();
    
    $ci->db->select($column);
    $query = $ci->db->get('tbl_website_settings');
    
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        return $result[$column] ?? null;
    }
    return null;
}

function get_userdata($column) {
    $ci = &get_instance();

    $ci->db->select($column);
    $ci->db->where('id',$ci->session->client_id);
    $query = $ci->db->get('tbl_users');
    
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        return $result[$column] ?? null;
    }
    return null;
}

function is_expired(){
    return;
}


function expired_message(){
    ?>
    <div class="col-xl-12 mb-3">
        
        
        <!--<div class="alert alert-warning alert-dismissible fade show custom-alert-icon shadow-sm" style="padding: 15px;" role="alert">-->
        <!--    <svg class="svg-warning" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000"><path d="M0 0h24v24H0z" fill="none"></path><path d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z"></path></svg>-->
        <!--    Your plan has expired. Please renew your subscription to access.  <a href="<?= site_url('subscription/plans') ?>" style="text-decoration:underline;" class="text-warning fw-semibold">Upgrade Now</a>-->
        <!--    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>-->
        <!--</div>-->
        
        <div class="alert alert-danger alert-dismissible fade show custom-alert-icon shadow-sm d-nne" role="alert">
            <svg class="svg-primary" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path></svg>
            <div class="text-danger w-100">
                <div class="fw-semibold d-flex justify-content-between">Account Alert<button type="button" class="btn-close p-0" data-bs-dismiss="alert" aria-label="Close"></button></div>
                <div class="fs-12 op-8 mb-1">Your subscription has expired. Please renew your subscription to access.</div>
                <div class="fs-12">
                    <a href="javascript:void(0);" class="text-danger fw-semibold me-2 d-inline-block">Cancel</a>
                    <a href="<?= site_url('subscription/plans') ?>" class="text-warning fw-semibold-">Upgrade Now</a>
                </div>
            </div>
        </div>
        
    </div>
    <?php
}