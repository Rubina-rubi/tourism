<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {

    private $accessControlObj;
    
	function  __construct() {
        parent::__construct();

        $this->accessControlObj = new Accesscontrol_helper();
		$this->accessControlObj->is_logged_in();
        
    }

	function index()
	{
        $data['message'] = trim($this->uri->segment(3));

        $data['businesses'] = $this->mod_information->business_view_all();

		$data['title'] = "Digime SMS System | View All Business";
		$data['current_nav']='nav3';
		$data['page']='business-view-all';
		$this->load->view("home",$data);
	}

	function add_edit(){
        $this->accessControlObj->page_access_by_user_account_type('super-admin');// Access Control

        $bi_id = trim($this->uri->segment(3));
        $details = $business_masking = false;
        if($bi_id){
            $business_masking = $this->mod_information->business_masking_view_all($bi_id);

            $details = $this->mod_information->business_details($bi_id);
            if (!$details) {
            	echo 'Invalid Request.'; exit();
            }
        }// END IF
        $data['business_masking'] = $business_masking;
		$data['details'] = $details;

        $data['users'] = $this->mod_user_access->system_user_view_all('customer-admin');


        if($this->input->post('submit')){
        	// print_r($_POST); exit();
            $add_edit = $this->mod_information->business_add_edit($bi_id);

            if($add_edit===true) {
            	if($user_details){ redirect('business/message/updated'); }
            	else{ redirect('business/message/added'); }                
            }
            else{
                $data['message'] = $add_edit;
            }
        }

		$data['title'] = "Digime SMS System | Add Business";
		$data['current_nav']='nav3';
		$data['page']='business-add-edit';
		$this->load->view("home", $data);
	}// END add_edit
}
