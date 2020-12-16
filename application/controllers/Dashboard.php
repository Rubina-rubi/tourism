`		<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$data = array();
		
	}

	public function index(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	public function add_package(){

		$this->form_validation->set_rules('place_name', 'Name', 'required');
		$this->form_validation->set_rules('place_cost', 'Cost', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('place_details', 'Details', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/add_package');
			$this->load->view('admin/footer');
		}else{
				
				$config['upload_path'] = './Photo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2000;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('place_img')) {
				   $sdata['msg'] = '<span style = "color:red;font-size:20px;">File Not Uploaded!</span>';
					$this->session->set_flashdata($sdata);
					redirect("Dashboard/add_package");
				return;
				} else {
				$avatar = $this->upload->data();
				$avatar_name = $avatar['file_name'];

				}

			$data['place_name']=$this->input->post('place_name',TRUE);
			$data['place_cost']=$this->input->post('place_cost',TRUE);
			$data['latitude']=$this->input->post('latitude',TRUE);
			$data['longitude']=$this->input->post('longitude',TRUE);
			$data['place_details']=$this->input->post('place_details',TRUE);
			$data['place_img']= $avatar['file_name'];

			$this->user_model->insertPackage($data);
			$sdata['msg'] = '<span style = "color:green;font-size:20px;">Package Added Successfully!</span>';
		   	$this->session->set_flashdata($sdata);
		    redirect('Dashboard/add_package');
			}
	}

	public function view_package(){
		$this->load->library('pagination');
		$config['base_url'] = site_url('Dashboard/view_package');
		 $config['total_rows'] = $this->db->get('tbl_package')->num_rows();
		 $config['per_page'] = 3;
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
			
			
			$place=$this->input->post('place_name',true);
			
			$query=$this->db->like('place_name',$place,'both')->limit($config['per_page'], $data['segment'])->order_by('p_id','desc')->get('tbl_package');
	
		}else{
			
			$query=$this->db->limit($config['per_page'], $data['segment'])->order_by('p_id','desc')->get('tbl_package');
	
			
		}
	
		$data['result']=$query->result_array();
		
		//$this->load->view('inc/navbar');
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_package',$data);
		$this->load->view('admin/footer');
	
	}

	public function edit_place($id){
		$this->form_validation->set_rules('place_name', 'Name', 'required');
		$this->form_validation->set_rules('place_cost', 'Cost', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('place_details', 'Details', 'required');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$data['editPlace'] =$this->user_model->getPlaceById($id);
			$this->load->view('admin/edit_place',$data);
			$this->load->view('admin/footer');
		}else{
			$old_img=$this->input->post('old_img',TRUE);
				
			$config['upload_path'] = './Photo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('place_img')) {
			} else {
			$avatar = $this->upload->data();
			$avatar_name = $avatar['file_name'];
			$data['place_img']=$avatar['file_name'];
			$file_path='Photo/'.$old_img.'';
			unlink($file_path);
			}
			$data['place_name']=$this->input->post('place_name',TRUE);
			$data['place_cost']=$this->input->post('place_cost',TRUE);
			$data['latitude']=$this->input->post('latitude',TRUE);
			$data['longitude']=$this->input->post('longitude',TRUE);
			$data['place_details']=$this->input->post('place_details',TRUE);
			$data['p_id']= $id;

			$this->user_model->updatePackage($data);
			$sdata['msg'] = '<span style = "color:green;font-size:20px;">Package Updated Successfully!</span>';
		   	$this->session->set_flashdata($sdata);
		    redirect("Dashboard/edit_place/$id");

		}
		
	}


	public function view_user(){
		$this->load->library('pagination');
		$config['base_url'] = site_url('Dashboard/view_user');
		 $config['total_rows'] = $this->db->get('tbl_user')->num_rows();
		 $config['per_page'] = 15;
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
			
			
			$place=$this->input->post('user_name',true);
			
			$query=$this->db->like('user_name',$place,'both')->limit($config['per_page'], $data['segment'])->order_by('id','desc')->get('tbl_user');
	
		}else{
			
			$query=$this->db->limit($config['per_page'], $data['segment'])->order_by('id','desc')->get('tbl_user');
	
			
		}
	
		$data['result']=$query->result_array();
		
		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_user',$data);
		$this->load->view('admin/footer');
	}

	public function del_place($id){
		$this->db->where('p_id',$id);
		$this->db->delete('tbl_package');
		redirect("Dashboard/view_package");
	}

	public function del_user($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_user');
		redirect("Dashboard/view_user");
	}

	public function disable_user($id){
		$this->db->set('user_status','0');
		$this->db->where('id',$id);
		$this->db->update('tbl_user');
		redirect("Dashboard/view_user");
	}

	public function enable_user($id){
		$this->db->set('user_status','1');
		$this->db->where('id',$id);
		$this->db->update('tbl_user');
		redirect("Dashboard/view_user");
	}

	public function add_admin(){
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[tbl_user.user_email]');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('user_mobile', 'Mobile', 'required');

	

	if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/add_admin');
			$this->load->view('admin/footer');
		}else{

		   $data['user_name']=$this->input->post('user_name',TRUE);
		   $data['user_email']=$this->input->post('user_email',TRUE);
		   $data['user_mobile']=$this->input->post('user_mobile',TRUE);
		   $data['user_type']=$this->input->post('user_type',TRUE);
		   $data['user_password']=md5($this->input->post('user_password',TRUE));
		
		   // $this->load->model('user_model');
		   $this->user_model->user_insert($data);
		   
	     	$sdata['msg'] = '<span style = "color:green;font-size:20px;">Admin Profile Created Successfully!</span>';
		   	$this->session->set_flashdata($sdata);
		   
		   redirect('Dashboard/add_admin');

		}
	}


	public function view_booking(){
		$data['result']="";
		
		$name=$this->input->get('name');
		
		$this->load->library('pagination');

		if(!empty($name)){
			
			$this->db->like('place_name',$name,'both');
			$this->db->or_like('user_name',$name,'both');
		
		}

		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url'] = site_url('Dashboard/view_booking');
		$config['total_rows'] = $this->db->get('vw_booking')->num_rows();
		$config['per_page'] = 5;
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

	
		if(!empty($name)){
			
			$this->db->like('place_name',$name,'both');
			$this->db->or_like('user_name',$name,'both');
			
		} 

		
		
		$query=$this->db->limit($config['per_page'], $data['segment'])->order_by('place_name','asc')->get('vw_booking');
	
		$data['result']=$query->result_array();
		
			
		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_booking',$data);
		$this->load->view('admin/footer');
	}

	public function add_package_img(){
		$this->form_validation->set_rules('place_id', 'Place Name', 'required');

		if ($this->form_validation->run()==FALSE) {

			$query= $this->db->get('tbl_package');
			$data['result'] = $query->result();

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/add_package_img',$data);
			$this->load->view('admin/footer');
		}else{
			$config['upload_path'] = './allImages/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$this->load->library('upload');
			 $this->upload->initialize($config);
			if (!$this->upload->do_upload('place_img')) {
			   
			   $sdata['msg'] = '<span style = "color:red;font-size:20px;">File Not Uploaded!</span>';
				$this->session->set_flashdata($sdata);
				redirect("Dashboard/add_package_img");
			return;
			} else {
			$avatar = $this->upload->data();
			$avatar_name = $avatar['file_name'];
			}

			$data['place_id']=$this->input->post('place_id',TRUE);
			$data['place_img']=$avatar['file_name'];

			$this->db->insert('tbl_place_img',$data);
	   
	     	$sdata['msg'] = '<span style = "color:green;font-size:20px;">Image Added Successfully!</span>';
		   	$this->session->set_flashdata($sdata);
		   
		   redirect('Dashboard/add_package_img');
		}
	}


	public function slide_img(){
		$this->form_validation->set_rules('slide_name', 'Slide Name', 'required');

		if ($this->form_validation->run()==FALSE) {

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/slide_img');
			$this->load->view('admin/footer');
		}else{
			$config['upload_path'] = './slide_img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$this->load->library('upload');
			 $this->upload->initialize($config);
			if (!$this->upload->do_upload('slide_img')) {
			   
			   $sdata['msg'] = '<span style = "color:red;font-size:20px;">File Not Uploaded!</span>';
				$this->session->set_flashdata($sdata);
				redirect("Dashboard/slide_img");
			return;
			} else {
			$avatar = $this->upload->data();
			$avatar_name = $avatar['file_name'];
			}

			$data['slide_name']=$this->input->post('slide_name',TRUE);
			$data['slide_img']=$avatar['file_name'];

			$this->db->insert('tbl_slide_img',$data);
	   
	     	$sdata['msg'] = '<span style = "color:green;font-size:20px;">Image Added Successfully!</span>';
		   	$this->session->set_flashdata($sdata);
		   
		   redirect('Dashboard/slide_img');
		}
	}
	
	

}