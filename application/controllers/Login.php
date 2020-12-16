<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$data = array();
		
	}

	public function index()
	{
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('user_password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('inc/header');
			$this->load->view('inc/navbar');
			$this->load->view('login');
			$this->load->view('inc/footer');
			}else{
				$data['user_email']=$this->input->post('user_email',TRUE);
				$data['user_password']=md5($this->input->post('user_password',TRUE));
				  
				$this->load->model('user_model');
				$this->user_model->user_login($data);
				 
			}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		
		redirect('Login');
		
	}
}