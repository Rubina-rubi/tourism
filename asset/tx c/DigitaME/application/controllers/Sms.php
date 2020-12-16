<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {

    private $accessControlObj;

	function  __construct() {
        parent::__construct();

        $this->accessControlObj = new Accesscontrol_helper();
		$this->accessControlObj->is_logged_in();
        $this->accessControlObj->page_access_by_user_account_type('customer-admin');// Access Control
        
    }

	function index()
	{
        redirect('sms/send');
	}

	function send(){
                 
        $data['message'] = trim($this->uri->segment(3));
        $data['last_error'] = urldecode(trim($this->uri->segment(4)));

        $ses_digime = $this->session->userdata('ses_digime');
        $su_id = $ses_digime['su_id'];
        $data['businesses'] = $this->mod_information->business_view_all($su_id);


        if($this->input->post('submit')){
        	// print_r($_POST); exit();
            $send_sms = $this->mod_information->send_sms_by_group();
            if($send_sms===true) {
                $last_error = $this->mod_information->last_error;
                redirect('sms/send/successful/'.urlencode($last_error));              
            }
            else{
                $data['message'] = $send_sms;
            }
        }
        

		$data['title'] = "Digime SMS System | Send SMS";
		$data['current_nav']='nav7';
		$data['page']='sms-send';
		$this->load->view("home", $data);
	
}// END send
}
