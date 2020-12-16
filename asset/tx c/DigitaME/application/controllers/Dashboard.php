<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private $accessControlObj;

	function  __construct() {
        parent::__construct();

        $this->accessControlObj = new Accesscontrol_helper();
		$this->accessControlObj->is_logged_in();
    }

	function index()
	{
		$ses_digime = $this->session->userdata('ses_digime');
        $su_id = $ses_digime['su_id'];

     	$today_date  = date("Y-m-d");
     	$today_month = date("m");
     	$today_year = date("Y");

		$data['all_sms_sent'] = $this->mod_information->all_sms_sent($su_id);
		$data['daily_sms_sent'] = $this->mod_information->daily_sms_sent($su_id, $today_date);
		$data['monthly_sms_sent'] = $this->mod_information->monthly_sms_sent($su_id,$today_month);
		$data['yearly_sms_sent'] = $this->mod_information->yearly_sms_sent($su_id,$today_year);
		$data['business_wise_sms_sent'] = $this->mod_information->business_wise_sms_sent($su_id);

		$data['title'] = "Digime SMS System";
		$data['current_nav']='nav1';
		$data['page']='dashboard';
		$this->load->view("home",$data);
	}
}
