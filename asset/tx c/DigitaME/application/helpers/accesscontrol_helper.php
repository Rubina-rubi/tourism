<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accesscontrol_helper{
    
    function is_logged_in(){

        $CI =& get_instance();
        $ses_digime = $CI->session->userdata('ses_digime');
        $is_logged_in = $ses_digime['is_logged_in'];
        if($is_logged_in != true){            
            redirect('login'); 
        }
    }// END function is_logged_in()
    
    function page_access_by_user_account_type($allow_user_types){
    	$arr_allow_user_types = array_map('trim', explode(',', $allow_user_types));

        $CI =& get_instance();
        $ses_digime = $CI->session->userdata('ses_digime');
        $sut_type_key = $ses_digime['sut_type_key'];
        if(!in_array($sut_type_key, $arr_allow_user_types)){            
            redirect('login'); 
        }
    }// END function page_access_by_user_account_type()
    
}// END class Accesscontrol_helper