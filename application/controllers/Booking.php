<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct(){
	parent::__construct();
	$this->load->model('user_model');
	$data = array();
	
	}

	public function user_booking($p_id){

		$query = $this->db->where('p_id',$p_id);
		$query = $this->db->get('tbl_package');
		$result=$query->result_array();
		$data['result']=$query->result_array();
		$this->load->view('inc/header');
		$this->load->view('inc/navbar');
		$this->load->view('booking',$data);
		$this->load->view('inc/footer');
	}
}