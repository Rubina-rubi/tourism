<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$data = array();
		
	}

	public function index()
	{
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[tbl_user.user_email]');
		//$this->form_validation->set_rules('user_password', 'Password', 'required |min_length[8]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|min_length[3]');
		//$this->form_validation->set_rules('user_con_password', 'password confirmation', 'required|matches[user_password]|min_length[3]');
		$this->form_validation->set_rules('user_mobile', 'Mobile', 'required');

	

	if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('inc/header');
			$this->load->view('inc/navbar');
			$this->load->view('Signup');
			$this->load->view('inc/footer');
		}else{

		   $data['user_name']=$this->input->post('user_name',TRUE);
		   $data['user_email']=$this->input->post('user_email',TRUE);
		   $data['user_mobile']=$this->input->post('user_mobile',TRUE);
		   $data['user_password']=md5($this->input->post('user_password',TRUE));
		   // $data['user_con_password']=md5($this->input->post('user_con_password',TRUE));

		
		   // $this->load->model('user_model');
		   $this->user_model->user_insert($data);
		   
	     	$sdata['msg'] = '<span style = "color:green;font-size:20px;">Profile Created Successfully!</span>';
		   	$this->session->set_flashdata($sdata);
		   
		   redirect('login');

		}
	}
}