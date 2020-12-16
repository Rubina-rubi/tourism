<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masking extends CI_Controller {

    private $accessControlObj;

	function  __construct() {
        parent::__construct();

        $this->accessControlObj = new Accesscontrol_helper();
		$this->accessControlObj->is_logged_in();
		
		$this->accessControlObj->page_access_by_user_account_type('super-admin');
    }

	function index()
	{
        $data['message'] = trim($this->uri->segment(3));

        $data['maskings'] = $this->mod_information->masking_view_all();

		$data['title'] = "Digime SMS System | View All System User";
		$data['current_nav']='nav5';
		$data['page']='masking-view-all';
		$this->load->view("home",$data);
	}

	function add_edit(){
        $mi_id = trim($this->uri->segment(3));
        $masking_details = false;
        if($mi_id){
            $masking_details = $this->mod_information->masking_details($mi_id);
            if (!$masking_details) {
            	echo 'Invalid Request.'; exit();
            }
        }// END IF
		$data['masking_details'] = $masking_details;


        if($this->input->post('submit')){
        	// print_r($_POST); exit();
            $add_edit = $this->mod_information->masking_add_edit($mi_id);

            if($add_edit===true) {
            	if($masking_details){ redirect('masking/message/updated'); }
            	else{ redirect('masking/message/added'); }                
            }
            else{
                $data['message'] = $add_edit;
            }
        }

		$data['title'] = "Digime SMS System | Add System User";
		$data['current_nav']='nav5';
		$data['page']='masking-add-edit';
		$this->load->view("home", $data);
	}// END add_edit
}
