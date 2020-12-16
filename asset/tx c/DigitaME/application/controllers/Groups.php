<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

    private $accessControlObj;

	function  __construct() {
        parent::__construct();

        $this->accessControlObj = new Accesscontrol_helper();
		$this->accessControlObj->is_logged_in();
        $this->accessControlObj->page_access_by_user_account_type('customer-admin');// Access Control
        
    }

	function index()
	{
        $data['message'] = trim($this->uri->segment(3));

        $ses_digime = $this->session->userdata('ses_digime');
        $su_id = $ses_digime['su_id'];

        $data['groups'] = $this->mod_information->group_view_all(false, $su_id);
        // echo '<pre>'; print_r($data['groups']); exit();

		$data['title'] = "Digime SMS System | View All Groups";
		$data['current_nav']='nav6';
		$data['page']='groups-view-all';
		$this->load->view("home",$data);
	}

	function add_edit(){

        $gi_id = trim($this->uri->segment(3));
        $details = false;
        if($gi_id){
            $details = $this->mod_information->group_details($gi_id);
            if (!$details) {
            	echo 'Invalid Request.'; exit();
            }
        }// END IF
		$data['details'] = $details;


        $ses_digime = $this->session->userdata('ses_digime');
        $su_id = $ses_digime['su_id'];
        $data['businesses'] = $this->mod_information->business_view_all($su_id);


        if($this->input->post('submit')){
        	// print_r($_POST); exit();
            $add_edit = $this->mod_information->group_add_edit($gi_id);

            if($add_edit===true) {
            	if($user_details){ redirect('groups/message/updated'); }
            	else{ redirect('groups/message/added'); }                
            }
            else{
                $data['message'] = $add_edit;
            }
        }

		$data['title'] = "Digime SMS System | Add Groups";
		$data['current_nav']='nav6';
		$data['page']='groups-add-edit';
		$this->load->view("home", $data);
	}// END add_edit
}
