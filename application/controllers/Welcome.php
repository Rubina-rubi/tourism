<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		$this->load->library('pagination');
		
		$config['base_url'] = site_url('Welcome/index');
		 $config['total_rows'] = $this->db->get('tbl_package')->num_rows();
		 $config['per_page'] = 9;
		 $config['num_links'] = 5;
		 $config['full_tag_open'] = '<ul class="pagination no-margin">';
		 $config['full_tag_close'] = '</ul>';
		 $config['cur_tag_open'] = '<li class="active"><a href="/">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		 $config['last_tag_open'] = '<li>';
		 $config['last_tag_close'] = '</li>';
		 $config['first_tag_open'] = '<li>';
		 $config['first_tag_close'] = '</li>';
		 $config['next_link'] = 'Next >';
		 $config['prev_link'] = '< Prev';

		 if ($this->uri->segment(3)) {
		 $data['segment'] = $this->uri->segment(3);
		 } else {
		 $data['segment'] = 0;
		 }
		$this->pagination->initialize($config);
		$this->load->database();
		
		
		if($this->input->post('submit',true)=="submit"){
			
			
			//$this_id=$this->input->post('student_id',true);
			
			$query=$this->db->limit($config['per_page'], $data['segment'])->order_by('r_count','desc')->get('tbl_package');
	
		}else{
			
			$query=$this->db->limit($config['per_page'], $data['segment'])->order_by('r_count','desc')->get('tbl_package');
			
		}
	
		$data['result']=$query->result_array();
		foreach($data['result'] as $row){
			
			$data['rating'][$row['p_id']]=$this->db->select('FLOOR(AVG(rating)) AS rate')->where('place_id',$row['p_id'])->get('tbl_rating')->result_array();
			// $data['b']=$this->db->where('place_id',$row['p_id'])->get('tbl_rating')->num_rows();
			
		}
		$slider = $this->db->limit('5');
		$slider = $this->db->get('tbl_slide_img');
		$data['slide'] = $slider->result_array();
		
		$this->load->view('inc/header');
		$this->load->view('inc/navbar');
		$this->load->view('index',$data);
		// $this->load->view('inc/footer');
	}

	public function viewFullPackage($p_id){

		$query = $this->db->where('p_id',$p_id);
		$query = $this->db->get('tbl_package');
		$result=$query->result_array();
		$data['result']=$result;
		$p_id=$result[0]['p_id'];
		
		$query5 = $this->db->where('place_id',$p_id);
		$query5 = $this->db->get('tbl_place_img');
		$result5=$query5->result_array();
		$data['img']=$result5;


		if($this->session->userdata('user_id')){
			
			$query2 = $this->db->select('r_id,rating');
			$query2 = $this->db->where('place_id',$p_id);
			$query2 = $this->db->where('user_id',$this->session->userdata('user_id'));
			$query2 = $this->db->get('tbl_rating');
			$data['rating']=$query2->result_array();
			
			
			if(($this->input->post('rating'))&&!$data['rating']){
				
				$rate['place_id']=$p_id;
				$rate['user_id']=$this->session->userdata('user_id');
				$rate['rating']=$this->input->post('rating');
				
				$this->db->insert('tbl_rating',$rate);
				

				$this->db->where('p_id', $p_id);
				$this->db->set('r_count', 'r_count+1', FALSE);
				$this->db->update('tbl_package');

				$query2 = $this->db->select('r_id,rating');
				$query2 = $this->db->where('place_id',$p_id);
				$query2 = $this->db->where('user_id',$this->session->userdata('user_id'));
				$query2 = $this->db->get('tbl_rating');
				$data['rating']=$query2->result_array();
				
				
				
			}else if(($this->input->post('rating'))&&$data['rating']){
				
				$rate['place_id']=$p_id;
				$rate['user_id']=$this->session->userdata('user_id');
				$rate['rating']=$this->input->post('rating');
				
				$this->db->set('rating',$rate['rating']);
				$this->db->where('r_id',$data['rating'][0]['r_id']);
				$this->db->update('tbl_rating');
				
				
				$query2 = $this->db->select('r_id,rating');
				$query2 = $this->db->where('place_id',$p_id);
				$query2 = $this->db->where('user_id',$this->session->userdata('user_id'));
				$query2 = $this->db->get('tbl_rating');
				$data['rating']=$query2->result_array();
				
				
				
			}
			
			
		}else{
			
			$query2 = $this->db->select('FLOOR(AVG(rating)) as rating');
			$query2 = $this->db->where('place_id',$p_id);
			$query2 = $this->db->get('tbl_rating');
			$data['rating']=$query2->result_array();
			
		}
		
		$query = $this->db->select('*');
		$query = $this->db->from('tbl_comment');
		$query = $this->db->join('tbl_user','tbl_user.id=tbl_comment.user_id');
		$query = $this->db->where('p_id',$p_id);
		$query = $this->db->get();;
		$data['comment']=$query->result_array();
		
		$data['review'] = $this->db->where('place_id',$p_id)->get('tbl_rating')->num_rows();
		$this->load->view('inc/header');
		$this->load->view('inc/navbar');
		$this->load->view('viewFull_package',$data);
		$this->load->view('inc/footer');
	}

	public function comment()
	{
				if(empty($this->session->userdata('user_id'))){
			redirect('Login');
		}
		date_default_timezone_set("Asia/Dhaka");
	 	$time = date("H:i:s a");
	 	$date = date('Y-m-d');
		$data['comment']=$this->input->post('comment',TRUE);
		$data['p_id']=$this->input->post('p_id',TRUE);
		$this->db->set('cmnt_time',$time);
		$this->db->set('cmnt_date',$date);
	    $data['user_id']=$this->session->userdata('user_id');
		$this->db->insert('tbl_comment',$data);
		$sdata['msg'] = '<span style = "color:green;font-size:20px;">Comment Successfully!</span>';
		   	$this->session->set_flashdata($sdata);
		redirect('Welcome/viewFullPackage/'.$data['p_id'].'');
	}

 
	public function booking($p_id){
		

		$data['user_id']=$this->session->userdata('user_id');
		$data['bkash_id']=$this->input->post('bkash_id','required',TRUE);
		$data['date']=$this->input->post('date',TRUE);
		$data['payment_type']=$this->input->post('payment_type',TRUE);
		$data['p_id']=$p_id;
		$data['b_date'] = date('y-m-d');

 	$book_number = $this->db->select('*')->from('tbl_booking')->where('p_id', $p_id)->where('date',$data['date'])->get()->num_rows();

 	$same_user = $this->db->select('*')->from('tbl_booking')->where('p_id', $p_id)->where('date',$data['date'])->where('user_id',$data['user_id'])->get()->num_rows();

 	if ($same_user>0) {
 		$sdata['msg'] = '<span style = "color:red;font-size:22px;">Sorry! You already booked this package!</span>';
		   	$this->session->set_flashdata($sdata);
		redirect('Booking/user_booking/'.$data['p_id'].'');
 	} 

 	if ($book_number>20) {
 		$sdata['msg'] = '<span style = "color:red;font-size:22px;">Sorry! This Package Completed for your selected date. Please choose another date for this package!</span>';
		   	$this->session->set_flashdata($sdata);
		redirect('Booking/user_booking/'.$data['p_id'].'');
 	}else{

		$this->db->insert('tbl_booking',$data);
		$sdata['msg'] = '<span style = "color:green;font-size:20px;">Booking Successfully!</span>';
		   	$this->session->set_flashdata($sdata);

		redirect("Booking/user_booking/$p_id");
	}
	}

	public function my_booking(){
		
		$query = $this->db->where('user_id',$this->session->userdata('user_id'))->order_by('b_date','desc')->get('vw_booking');
		$result=$query->result_array();
		$data['result']=$query->result_array();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/my_booking',$data);
		$this->load->view('admin/footer');
	}

}
