<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $accessControlObj;

	function  __construct() {
        parent::__construct();

        $this->accessControlObj = new Accesscontrol_helper();
		$this->accessControlObj->is_logged_in();
    }

	function index()
	{
		$data['title'] = "Digime SMS System"; // Capitalize the first letter
		$data['current_nav']='nav0';
        $data['sub_current_nav']='';
		$data['page']='dashboard';
		$this->load->view("home",$data);
	}
}
