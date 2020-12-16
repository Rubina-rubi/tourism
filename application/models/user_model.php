<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	function user_insert($data){
		$this->db->insert('tbl_user',$data);
	}

	function insertPackage($data){
		$this->db->insert('tbl_package',$data);
	}

	function updatePackage($data){
		$this->db->where('p_id',$data['p_id']);
		$this->db->update('tbl_package',$data);

	}

	function getPlaceById($id){
		$this->db->select('*');
		$this->db->from('tbl_package');
		$this->db->where('p_id',$id);
		$queryResult = $this->db->get();
		$result = $queryResult->row();
		return $result;
	}


	function user_login($data){

		$query = $this->db->select('*');
		$this->db->where('user_email',$data['user_email']);
		$this->db->where('user_password',$data['user_password']);
		$query = $this->db->get('tbl_user');
		
		$restult = $query->result_array();
		
		if(!empty($restult)){
			
			$this->session->set_userdata('login_status','1');
			$this->session->set_userdata('user_id',$restult[0]['id']);
			$this->session->set_userdata('user_status',$restult[0]['user_status']);
			$this->session->set_userdata('user_type',$restult[0]['user_type']);
			$this->session->set_userdata('user_name',$restult[0]['user_name']);
			
			$user_name=$this->session->userdata('user_name');
			$user_type=$this->session->userdata('user_type');
			$user_id=$this->session->userdata('user_id');
			
			
			if($this->session->userdata('user_status')=='0'){
				
				$sdata['msg'] = '<span style = "color:red;font-size:20px;">Your Id Is Disable!</br>contact with admin</span>';
				$this->session->set_flashdata($sdata);
				redirect('login');
				
			}else if($this->session->userdata('user_status')=='1'){
			
				if($this->session->userdata('user_type')=='user'||'admin'){
					redirect('Welcome');
				}else if($this->session->userdata('user_type')=='Superadmin'){
					redirect('Welcome');
				}
			
			}
			
			
			
			
		}else{
			
			$sdata['msg'] = '<span style = "color:red;font-size:20px;font-family:none!important;">Invalid Email or Password!</span>';
			$this->session->set_flashdata($sdata);
			redirect('login');
		}
	}
}