<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    private $accessControlObj;

	function  __construct() {
        parent::__construct();

        $this->accessControlObj = new Accesscontrol_helper();
		    $this->accessControlObj->is_logged_in();
        
    }

	function index()
	{
        redirect('404');
	}

	function get_contact_groups(){
      $res_groups = array();

          $keyword = strtolower($this->input->get('term'));
          $groups = $this->mod_information->group_view_all(false, false, $keyword);
          if($groups){
            foreach ($groups as $val) {
              $gi_name = $val['gi_name'];
              array_push($res_groups, $gi_name);
            }           
          }

        echo json_encode($res_groups);
	}// END get_contact_groups

    function groups_by_business(){
      $result = array();
      $bi_id = ($this->input->post('bi_id')) ? $this->input->post('bi_id') : $this->input->get('bi_id');
      $groups = $this->mod_information->group_view_all($bi_id);
      if($groups){
        $result = $groups;
      }
      echo json_encode($result);
    }// END groups_by_business

    function get_masking(){
      $res_masks = array();
          $keyword = strtolower($this->input->get('term'));
          $maskings = $this->mod_information->masking_view_all(true, $keyword);
          if($maskings){
            foreach ($maskings as $val) {
              $mi_mask = $val['mi_mask'];
              array_push($res_masks, $mi_mask);
            }           
          }

        echo json_encode($res_masks);
    }// END get_masking

    function mask_by_business(){
      $result = array();
      $bi_id = ($this->input->post('bi_id')) ? $this->input->post('bi_id') : $this->input->get('bi_id');


        $details = $business_masking = false;
        if($bi_id){
            $details = $this->mod_information->business_details($bi_id);
            $business_masking = $this->mod_information->business_masking_view_all($bi_id);
        }// END IF
        $result['business_masking'] = $business_masking;
        $result['business_details'] = $details;

      echo json_encode($result);
    }// END mask_by_business
}
