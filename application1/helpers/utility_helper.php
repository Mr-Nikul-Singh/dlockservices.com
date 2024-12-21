<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** 
 * @param mixed $type
 * @return bool
 */

function go_back($margin = null,$type = 'sm',$add_class = null){
    
        return '<a class="btn mr-'.$margin.' btn-'.$type.' '.$add_class.' btn-primary" href="javascript:history.go(-1)" '.tooltip('top','Back').'>Back</a>';
    
    // if(isset($_SERVER['HTTP_REFERER'])):
    //     $url = $_SERVER['HTTP_REFERER'];
    //     return '<a class="btn mr-'.$margin.' btn-'.$type.' btn-outline-primary" href="'.$url.'"><i class="fa fa-arrow-left"></i> Back</a>';
    // endif;
}