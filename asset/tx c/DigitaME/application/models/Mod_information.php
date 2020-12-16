<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Mod_information extends CI_model
	{
		public function __construct()
		{
	        parent::__construct();
		}

    	public $last_result;
    	public $last_error;

	    function do_curl_request($method, $url, $data, $printr=false){

	      	$query = "";
	      	if($method == "GET") {
		 		$query.="?".http_build_query($data);
			}
	        $url = $url.$query;

		      if ($printr) {
		        echo 'URL: '.$url.'<br/><br/><pre>';
		        print_r($data);
		        echo '</pre>'; 
		        // exit();
		      }

			// Do Curl
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);

	      	// Disable SSL verification
	      	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			if($method == "GET") {				
					curl_setopt($ch, CURLOPT_POST, false);
	     	} else {
	     	  	if($method == "PUT") {
		          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		          curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PUT'));
		        }
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));			
			}
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);

			if(is_array($output)){
				$arr = $output;
			}
			else{
		    	$arr = simplexml_load_string($output, "SimpleXMLElement", LIBXML_NOCDATA);		
			}

			$json = json_encode($arr);
			$result = json_decode($json,false);		
			return $result;
	    }// END do_curl_request

	    function _isSuccess($result) {
	        $this->last_error = "";
	        if (isset($result['success']) && $result['success']) {
	            return true;
	        }
	        // echo '<pre>'; print_r($result); exit();
	        $this->last_error = $this->_getError($result);
	        return false;
	    }// END _isSuccess

	    function _getError($result) {
	        // echo '<pre>'; print_r($result); exit();
	        if(isset($result['success']) && $result['success']){
	            return 'No error';
	        }

	        $msg = "unknown";
	        if (isset($result['msg'])) {
	            $msg = $result['msg'];
	        }

	        if (isset($result['message'])) {
	            $msg = $result['message'];
	        }


	        $moreinfo = "";
	        if (isset($result['data'])) {
	            if (isset($result['data']['errors']) && is_array($result['data']['errors'])) {
	                $moreinfo = implode(" / ", $result['data']['errors']);
	            }

	            if (is_array($result['data']) && count($result['data']) > 0) {
	                foreach ($result['data'] as $key => $value) {
	                    $moreinfo .= $value.'; ';
	                }
	            }
	        }

	        if (isset($result['errors']['errors']) && is_array($result['errors']['errors']) && count($result['errors']['errors']) > 0) {
	            // This type errors we are getting from refresh webcard or insert webcard API request
	            foreach ($result['errors']['errors'] as $key => $value) {
	                $temp_more_info = '';
	                if (is_array($value) && count($value) > 0) {
	                    foreach ($value as $key2 => $val2) {
	                        if(isset($val2['errors'][0])){
	                            $temp_more_info .= $val2['errors'][0].', ';
	                        }
	                    }
	                    $temp_more_info = rtrim($temp_more_info, ', ');
	                }
	                $moreinfo .= $key.' - '.$temp_more_info.'; ';
	            }
	        }
	        else if (isset($result['errors']) && is_array($result['errors']) && count($result['errors']) > 0) {
	            foreach ($result['errors'] as $key => $value) {
	                $moreinfo .= $value.'; ';
	            }
	        }
	        else{}

	        return "API error: $msg ({$moreinfo})";
	    }// END _getError

	    function is_valid_mobile($mobile_number){
	    	if($mobile_number!='' && strlen($mobile_number) == 11 && (substr($mobile_number, 0, 2) == '01') ){
	    		return true;
	    	}
	    	else{
	    		return false;
	    	}
	    }// END is_valid_mobile

	    function business_view_all($su_id = false){
	        $sql = "SELECT * FROM tbl_business_information, system_users WHERE tbl_business_information.su_id = system_users.su_id ";
	        if($su_id){
	        	$sql .= " AND system_users.su_id = '$su_id' ";
	        }
	        $sql .= " ORDER BY tbl_business_information.su_id DESC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->result_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }

	    // function business_view_user($su_id = false){
	    //     $sql = "SELECT * FROM tbl_business_information, system_users WHERE tbl_business_information.su_id = system_users.su_id ";
	    //     if($su_id){
	    //     	$sql .= " AND system_users.su_id = '$su_id' ";
	    //     }
	    //     $sql .= " ORDER BY tbl_business_information.su_id DESC";

	    //     $query=$this->db->query($sql);
	    //     if($query -> num_rows()>0){
	    //         $result = $query->result_array();
	    //         return $result;
	    //     }
	    //     else{
	    //     	return false;
	    //     }
	    // }// END business_view_all

	    function business_details($bi_id, $su_id = false){
	        $sql = "SELECT * FROM tbl_business_information, system_users WHERE tbl_business_information.su_id = system_users.su_id ";

	        if($bi_id){
	        	$sql .= " AND tbl_business_information.bi_id = '$bi_id' ";
	        }

	        if($su_id){
	        	$sql .= " AND system_users.su_id = '$su_id' ";
	        }

	        $sql .= " ORDER BY tbl_business_information.bi_id DESC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            // $result = $query->result_array();
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END business_details

	    function business_masking_view_all($bi_id, $mi_id = false, $return_row_array = false){
	        $sql = "SELECT * FROM tbl_business_masking, tbl_business_information, tbl_masking_information WHERE tbl_masking_information.mi_id = tbl_business_masking.mi_id AND tbl_business_masking.bi_id = tbl_business_information.bi_id ";

	        if($mi_id){
	        	$sql .= " AND tbl_masking_information.mi_id = '$mi_id' ";
	        }
	        if($bi_id){
	        	$sql .= " AND tbl_business_information.bi_id = '$bi_id' ";
	        }

	        if(!$mi_id && !$bi_id){ return false; }

	        $sql .= " ORDER BY tbl_masking_information.mi_name ASC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = ($return_row_array) ? $query->row_array() : $query->result_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END business_masking_view_all

	    function business_masking_delete($bi_id, $arr_masking = false){
			if($arr_masking){
				$business_masking = $this->business_masking_view_all($bi_id);
				foreach ($business_masking as $key => $val) {
					if(array_search($val['mi_id'], array_column($arr_masking, 'mi_id'))===false){
				        $this->db->where('bm_id', $val['bm_id']);
				        $this->db->delete('tbl_business_masking');
					}
				}
			}
			else{
		        $this->db->where('bi_id', $bi_id);
		        $this->db->delete('tbl_business_masking');
			}
	        return true;
	    }// END business_masking_delete

	    function business_add_edit($bi_id=false){
			$system_user = $this->input->post('system_user');
			$business_name = trim($this->input->post('business_name'));
			if(!$business_name){ return 'Name Required'; }

			$user_details = $this->mod_user_access->system_user_details($system_user);
			if(!$user_details){
				return 'Request with invalid user.';
			}
			if($user_details['sut_type_key']!='customer-admin'){ return 'Selected User must have to be customer admin'; }



			$allow_masking = $this->input->post('allow_masking');
			
			$arr_masking = array();
			if($allow_masking){
				$masking = array_unique(array_map('trim', explode(',', $this->input->post('masking'))));
				if (count($masking) > 0) {
					foreach ($masking as $key => $mi_mask) {
						$masking_details = $this->masking_details(false, $mi_mask);
						if ($masking_details) {
							if(array_search($masking_details['mi_id'], array_column($arr_masking, 'mi_id'))===false){
								$temp = array('mi_mask' => $mi_mask, 'mi_id' => $masking_details['mi_id']);
								array_push($arr_masking, $temp);
							}
						}// END IF
						else{
							return 'Invalid masking request - '.$mi_mask;
						}
					}
				}// END IF				
			}

            $data = array (
                'su_id' => $system_user,
                'bi_name' => $business_name,
                'bi_allow_masking' => $allow_masking
            );

        	if($bi_id){
                $this->db->where('bi_id', $bi_id);
                $this->db->update('tbl_business_information', $data);  
        	}
        	else{
        		$this->db->insert('tbl_business_information', $data);
            	$bi_id = $this->db->insert_id();
        	}


        	// Addred Contacts into Group
        	if (count($arr_masking) > 0) {
        		// Disconnect from Groups
				$res = $this->business_masking_delete($bi_id, $arr_masking);

        		foreach ($arr_masking as $val) {
        			$mi_id = $val['mi_id'];
        			$mi_mask = $val['mi_mask'];
					$res = $this->business_masking_view_all($bi_id, $mi_id);
					if(!$res){
			            $data = array (
			                'bi_id' => $bi_id,
			                'mi_id' => $mi_id
			            );
		        		$this->db->insert('tbl_business_masking', $data);
		            	$bm_id = $this->db->insert_id();						
					}
        		}
        	}// END IF count($arr_masking) > 0

            return true;
	    }// END business_add_edit

	    function group_contact_view_all($ci_id, $gi_id = true){

	        $sql = "SELECT * FROM tbl_group_contact, tbl_group_information, tbl_contact_information, tbl_mobile_operator WHERE tbl_contact_information.ci_id = tbl_group_contact.ci_id AND tbl_group_contact.gi_id = tbl_group_information.gi_id AND tbl_contact_information.mo_id = tbl_mobile_operator.mo_id AND tbl_group_information.gi_status=1";

	        if($ci_id){
	        	$sql .= " AND tbl_contact_information.ci_id = '$ci_id' ";
	        }
	        if($gi_id){
	        	$sql .= " AND tbl_group_information.gi_id = '$gi_id' ";
	        }

	        $sql .= " ORDER BY tbl_group_information.gi_name ASC";
	        

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->result_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END group_contact_view_all

	    function group_contact_delete($ci_id, $arr_excluding_contact_groups = false){
			if($arr_excluding_contact_groups){
				$group_contacts = $this->group_contact_view_all($ci_id);
				foreach ($group_contacts as $key => $val) {
					if(array_search($val['gi_id'], array_column($arr_excluding_contact_groups, 'gi_id'))===false){
				        $this->db->where('gc_id', $val['gc_id']);
				        $this->db->delete('tbl_group_contact');
					}
				}
			}
			else{
		        $this->db->where('ci_id', $ci_id);
		        $this->db->delete('tbl_group_contact');
			}
	        return true;
	    }// END group_contact_delete

	    function group_view_all($bi_id, $su_id = false, $keyword = false){
	        $sql = "SELECT * FROM tbl_group_information, tbl_business_information WHERE tbl_business_information.bi_id = tbl_group_information.bi_id AND tbl_group_information.gi_status!='0' ";

	        if($bi_id){
	        	$sql .= " AND tbl_business_information.bi_id = '$bi_id' ";
	        }
	        else if($su_id){
	        	$sql .= " AND tbl_business_information.su_id = '$su_id' ";
	        }
	        else if($keyword){
	        	$sql .= " AND tbl_group_information.gi_name LIKE '$keyword%' ";
	        }
	        else{
	        	return false;
	        }

	        $sql .= " ORDER BY tbl_group_information.gi_id DESC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->result_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END group_view_all

	    function group_details($gi_id, $su_id = false, $gi_name = false){
	        $sql = "SELECT * FROM tbl_group_information, tbl_business_information WHERE tbl_business_information.bi_id = tbl_group_information.bi_id AND tbl_group_information.gi_status=1";

	        if($gi_id){
	        	$sql .= " AND tbl_group_information.gi_id = '$gi_id' ";
	        }

	        if($su_id){
	        	$sql .= " AND tbl_mobile_operator.mo_id = '$su_id' ";
	        }

	        if($gi_name){
	        	$sql .= " AND tbl_group_information.gi_name = '$gi_name' ";
	        }

	        $sql .= " ORDER BY tbl_group_information.gi_id DESC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            // $result = $query->result_array();
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END group_details

	    function group_add_edit($gi_id=false){
			$bi_id = $this->input->post('bi_id');

			$group_name = trim($this->input->post('group_name'));
			if(!$group_name){ return 'Name Required'; }
			$status = $this->input->post('status');


	        $ses_digime = $this->session->userdata('ses_digime');
	        $su_id = $ses_digime['su_id'];

			$business_details = $this->business_details($bi_id, $su_id);
			if(!$business_details){
				return 'Request with invalid business.';
			}

            $data = array (
                'bi_id' => $bi_id,
                'gi_name' => $group_name,
                'gi_status' => $status
            );

        	if($gi_id){
                $this->db->where('gi_id', $gi_id);
                $this->db->update('tbl_group_information', $data);  
        	}
        	else{
        		$this->db->insert('tbl_group_information', $data);
            	$gi_id = $this->db->insert_id();
        	}
            return true;
	    }// END group_add_edit

	    function contact_view_all($bi_id, $su_id = false){
	    
	        $sql = "SELECT * FROM tbl_contact_information, tbl_business_information, tbl_mobile_operator, tbl_group_information WHERE tbl_business_information.bi_id = tbl_contact_information.bi_id AND tbl_contact_information.mo_id = tbl_mobile_operator.mo_id AND tbl_contact_information.bi_id = tbl_group_information.bi_id";


	        if($bi_id){
	        	$sql .= " AND tbl_business_information.bi_id = '$bi_id' ";
	        }
	        else if($su_id){
	        	$sql .= " AND tbl_business_information.su_id = '$su_id' ";
	        }
	        else{
	        	return false;
	        }

	        $sql .= " ORDER BY tbl_group_information.gi_name ASC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->result_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END contact_view_all

	    function contact_details($ci_id, $su_id = false){
	        $sql = "SELECT * FROM tbl_contact_information, tbl_business_information, tbl_mobile_operator WHERE tbl_business_information.bi_id = tbl_contact_information.bi_id AND tbl_contact_information.mo_id = tbl_mobile_operator.mo_id ";

	        if($ci_id){
	        	$sql .= " AND tbl_contact_information.ci_id = '$ci_id' ";
	        }

	        if($su_id){
	        	$sql .= " AND tbl_mobile_operator.mo_id = '$su_id' ";
	        }

	        $sql .= " ORDER BY tbl_contact_information.bi_id DESC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            // $result = $query->result_array();
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END contact_details

	    function mobile_operator_details($mo_id, $mo_code = false){
	        $sql = "SELECT * FROM tbl_mobile_operator WHERE tbl_mobile_operator.mo_code != '' ";

	        if($mo_id){
	        	$sql .= " AND tbl_mobile_operator.mo_id = '$mo_id' ";
	        }
	        else if($mo_code){
	        	$sql .= " AND tbl_mobile_operator.mo_code = '$mo_code' ";
	        }
	        else{ return false; }

	        $sql .= " ORDER BY tbl_mobile_operator.mo_id DESC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            // $result = $query->result_array();
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END mobile_operator_details

	    function get_mobile_operator_by_contact_number($contact_number){
	    	$mo_code = substr($contact_number, 0, 3);
			$mobile_operator_details = $this->mobile_operator_details(false, $mo_code);
			if ($mobile_operator_details) {
				return $mobile_operator_details['mo_id'];
			}
			else{
				return false;
			}
	    }// END get_mobile_operator_by_contact_number

	    function contact_add_edit($ci_id=false){
			$bi_id = $this->input->post('bi_id');
			$name = trim($this->input->post('name'));
			if(!$name){ return 'Name Required'; }

			$contact_number = trim($this->input->post('contact_number'));
			$mo_id = $this->get_mobile_operator_by_contact_number($contact_number);
			if($mo_id===false){
				return 'Invalid contact number.';
			}
			$contact_number = substr($contact_number, 3);

			$email = trim($this->input->post('email'));
			$status = $this->input->post('status');

			$business_details = $this->business_details($bi_id);
			if(!$business_details){
				return 'Request with invalid business.';
			}

			$arr_contact_groups = array();
			$contact_groups = array_unique(array_map('trim', explode(',', $this->input->post('contact_groups'))));
			if (count($contact_groups) > 0) {
				foreach ($contact_groups as $key => $gi_name) {
					$group_details = $this->group_details(false, false, $gi_name);
					if ($group_details) {
						if(array_search($group_details['gi_id'], array_column($arr_contact_groups, 'gi_id'))===false){
							$temp = array('gi_name' => $gi_name, 'gi_id' => $group_details['gi_id']);
							array_push($arr_contact_groups, $temp);
						}
					}// END IF
					else{
						return 'Invalid group request - '.$gi_name;
					}
				}
			}// END IF

            $data = array (
                'bi_id' => $bi_id,
                'ci_name' => $name,
                'mo_id' => $mo_id,
                'ci_contact_number' => $contact_number,
                'ci_email' => $email,
                'ci_status' => $status
            );

        	if($ci_id){
                $this->db->where('ci_id', $ci_id);
                $this->db->update('tbl_contact_information', $data);  
        	}
        	else{
        		$this->db->insert('tbl_contact_information', $data);
            	$ci_id = $this->db->insert_id();
        	}

        	// Addred Contacts into Group
        	if (count($arr_contact_groups) > 0) {
        		// Disconnect from Groups
				$res = $this->group_contact_delete($ci_id, $arr_contact_groups);

        		foreach ($arr_contact_groups as $val) {
        			$gi_id = $val['gi_id'];
        			$gi_name = $val['gi_name'];
					$res = $this->group_contact_view_all($ci_id, $gi_id);
					if(!$res){
			            $data = array (
			                'ci_id' => $ci_id,
			                'gi_id' => $gi_id
			            );
		        		$this->db->insert('tbl_group_contact', $data);
		            	$gc_id = $this->db->insert_id();						
					}
        		}
        	}// END IF count($arr_contact_groups) > 0

            return true;
	    }// END contact_add_edit

	    /*
	    ---------------------------------------------------------
	    ---------------------------------------------------------
	    	START | Send SMS
	    ---------------------------------------------------------
	    ---------------------------------------------------------
	    */

	    function sms_sending_info_add_edit($values, $ssi_id=false){

			$data = array(
				'bi_id' => (isset($values['bi_id'])) ? $values['bi_id'] : null,
				'ci_id' => (isset($values['ci_id'])) ? $values['ci_id'] : null,
				'mi_id' => (isset($values['mi_id'])) ? $values['mi_id'] : null,
				'ssi_sms' => (isset($values['ssi_sms'])) ? $values['ssi_sms'] : null,
				'ssi_response_value' => (isset($values['ssi_response_value'])) ? $values['ssi_response_value'] : null,
				'ssi_status' => (isset($values['ssi_status'])) ? $values['ssi_status'] : null
			);

        	if($ssi_id){
                $this->db->where('ssi_id', $ssi_id);
                $this->db->update('tbl_sms_sending_info', $data);  
        	}
        	else{
        		$this->db->insert('tbl_sms_sending_info', $data);
            	$ssi_id = $this->db->insert_id();
        	}

            return true;
	    }// END sms_sending_info_add_edit


	    function sending_sms($message, $mobile_number, $mask){
	    	if(!$mask){ return "Send SMS - Undefined masking."; }

	    	if(!$message){ return "Send SMS - SMS can't be empty"; }

	    	if(!$mobile_number){ return "Send SMS - Mobile number can't be empty"; }

			$mobile_number_type = 'gp';// Temporarily Mobile Number Type Set statically
	    	// Set DATA
	    	if($mobile_number_type == 'gp'){
				$url = 'https://cbsms.grameenphone.com/send_sms_api/send_sms_from_api.php';
				$data = array();
				$data['user_name'] = 'DigitaInteractive'; // {Valid User Name}
				$data['password'] = 'DigitaADMIN123';
				$data['subscriber_no'] = ltrim($mobile_number, '0');
				$data['mask'] =  $mask;// Digita or SylhetDeals
				$data['sms'] = $message;
	    	}
	    	else{
	    		return "Send SMS - Invalid mobile type to send SMS";
	    	}


	    	// Send SMS do curl
	    	$method = "GET";
	    	$do_curl_request = $this->do_curl_request($method, $url, $data);
	    	// echo '<pre>'; print_r($do_curl_request); exit();

	    	if($do_curl_request->status!="SMS sent"){
	    		return $do_curl_request->status.' ('.$do_curl_request->remarks.')';
	    	}

	        return true;
	    }// END sending_sms

	    function send_sms_by_group(){
			$bi_id = $this->input->post('bi_id');
			$mi_id = $this->input->post('mi_id');
			$message = trim($this->input->post('sms'));

	        $ses_digime = $this->session->userdata('ses_digime');
	        $su_id = $ses_digime['su_id'];

			$business_details = $this->business_details($bi_id, $su_id);
			if(!$business_details){
				return 'Request with invalid business.';
			}
			
			$masking_details = false;
			if($business_details['bi_allow_masking']){
				$masking_details = $this->business_masking_view_all($bi_id, $mi_id, true);
				if(!$masking_details){
					return 'Request with invalid masking.';
				}				
			}

			// Set Mask
			if($masking_details){
				$mask = $masking_details['mi_mask'];
			}
			else{
				// Non Masking
				$mask = false;
			}



			$group = trim($this->input->post('group'));
			if($group){
				$contacts = $this->group_contact_view_all(false, $group);
			}
			else{
				$contacts = $this->contact_view_all($bi_id);
			}

			$result = array('data' => array(), 'success' => 0, 'failed' => 0);
			if (count($contacts) > 0) {
				foreach ($contacts as $val) {
					$contact_number = $val['mo_code'].$val['ci_contact_number'];
					$res = $this->sending_sms($message, $contact_number, $mask);

					$ci_id = $val['ci_id'];
					$temp_data = array('ci_id' => $ci_id, 'success' => '', 'message' => '');
					if($res===true){
						$ssi_status = 1;// Sent Successfully

						$result['success'] += 1;
						$temp_data['success'] = true;
					}
					else{
						$ssi_status = 0;// Uanble to Sent

						$result['failed'] += 1;
						$temp_data['message'] = $res;
					}

					array_push($result['data'], $temp_data);

					// Keep SMS sending LOG
					$data = array(
						'bi_id' => $bi_id,
						'ci_id' => $ci_id,
						'mi_id' => $mi_id,
						'ssi_sms' => $message,
						'ssi_response_value' => $res,
						'ssi_status' => $ssi_status
					);

					$res = $this->sms_sending_info_add_edit($data);
				}
			}// END IF

			$this->last_result = $result;
			$this->last_error = 'SMS Sent Successfully - '.$result['success'].', Failed to sent - '.$result['failed'].'.';

			// echo '<pre>'; print_r($result); exit();
			if($result['success'] > 0){
				return true;
			}
			else{
            	return $res;				
			}
	    }// END send_sms_by_group

	    /*
	    ---------------------------------------------------------
	    ---------------------------------------------------------
	    	END | Send SMS
	    ---------------------------------------------------------
	    ---------------------------------------------------------
	    */


	    function sms_details($type){
	        $sql = "SELECT * FROM tbl_sms_details, tbl_sms_type WHERE tbl_sms_details.st_id = tbl_sms_type.st_id AND tbl_sms_type.st_key = '$type'";
	        $query=$this->db->query($sql);
	        $result = $query->row_array();
        	//$result = $query->result_array();
	        return $result;
	    }// END sms_details

	    function update_sms_details(){
	        $checkin_message = trim($this->input->post('checkin-message'));
	        $checkout_message = trim($this->input->post('checkout-message'));
	        $birthday_message = trim($this->input->post('birthday-message'));

	        $checkin_sd_id = trim($this->input->post('checkin-id'));
	        $checkout_sd_id = trim($this->input->post('checkout-id'));
	        $birthday_sd_id = trim($this->input->post('birthday-id'));

	        if($checkin_message != '' && $checkout_message != ''){
	            $data = array (
	                'sd_body' => $checkin_message
	            );
	            $this->db->where('sd_id',$checkin_sd_id);
	            $this->db->update('tbl_sms_details',$data);
	            
	            $data = array (
	                'sd_body' => $checkout_message
	            );
	            $this->db->where('sd_id',$checkout_sd_id);
	            $this->db->update('tbl_sms_details',$data);
	            
	            $data = array (
	                'sd_body' => $birthday_message
	            );
	            $this->db->where('sd_id',$birthday_sd_id);
	            $this->db->update('tbl_sms_details',$data);

	            return 'updated';
	        }
	        else{
	            return 'empty-field'; 
	        }
	    }// END update_sms_details

	    function write_user_log($file_name, $message){
        	$message.=' on '.date('F j, Y, h:i:s a', time());

	        $file_location = 'downloads/'.$file_name.'.txt';
	        $file = fopen($file_location,"a");
	        fwrite($file, "\n".$message);
	        fclose($file);
	    }// END write_user_log

	    /*
	    ---------------------------------------------------------
	    ---------------------------------------------------------
	    	START | Masking
	    ---------------------------------------------------------
	    ---------------------------------------------------------
	    */

	    function masking_view_all($mi_status = null, $keyword = false){
	        $sql = "SELECT * FROM tbl_masking_information WHERE tbl_masking_information.mi_id != '' ";

	        if($mi_status!==null){
	        	$sql .= " AND tbl_masking_information.mi_status = '$mi_status' ";
	        }

	        if($keyword){
	        	$sql .= " AND tbl_masking_information.mi_mask LIKE '$keyword%' ";
	        }

	        $sql .= " ORDER BY tbl_masking_information.mi_name ASC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->result_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END masking_view_all

	    function masking_details($mi_id, $mi_mask = false){
	        $sql = "SELECT * FROM tbl_masking_information WHERE tbl_masking_information.mi_id != '' ";


	        if($mi_mask){
	        	if($mi_id){
		        	$sql .= " AND tbl_masking_information.mi_id != '$mi_id' ";
		        }
	        	$sql .= " AND tbl_masking_information.mi_mask = '$mi_mask' ";
	        }
	        else if($mi_id){
	        	$sql .= " AND tbl_masking_information.mi_id = '$mi_id' ";
	        }

	        $sql .= " ORDER BY tbl_masking_information.mi_id DESC";

	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            // $result = $query->result_array();
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END masking_details

	    function masking_add_edit($mi_id=false){
			$name = trim($this->input->post('name'));
			if(!$name){ return 'Name Required'; }
			$mask = trim($this->input->post('mask'));
			if(!$mask){ return 'Mask Required'; }

			$status = $this->input->post('status');

			$masking_details = $this->masking_details($mi_id, $mask);
			if($masking_details){
				return 'This mask already exist.';
			}

            $data = array (
                'mi_name' => $name,
                'mi_mask' => $mask,
                'mi_status' => $status
            );

        	if($mi_id){
                $this->db->where('mi_id', $mi_id);
                $this->db->update('tbl_masking_information', $data);  
        	}
        	else{
        		$this->db->insert('tbl_masking_information', $data);
            	$mi_id = $this->db->insert_id();
        	}
            return true;
	    }// END group_add_edit

	     // Toal SMS sent by individual User
	    function all_sms_sent($su_id){

	    	$sql = "SELECT COUNT(ssi_response_value) FROM tbl_sms_sending_info, tbl_business_information WHERE tbl_sms_sending_info.bi_id=tbl_business_information.bi_id AND ssi_status='1' AND tbl_business_information.su_id=$su_id";
	    	$query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }


	    // Daily SMS sent by individual User
	    function daily_sms_sent($su_id, $today_date){

	      	$sql = "SELECT count(ssi_response_value) AS numberdaily FROM tbl_sms_sending_info, tbl_business_information WHERE tbl_sms_sending_info.bi_id=tbl_business_information.bi_id  AND ssi_status='1' AND tbl_business_information.su_id=$su_id AND tbl_sms_sending_info.ssi_inserted  LIKE '$today_date%'";
	    	$query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }

	    // Monthly SMS sent by individual User
	    function monthly_sms_sent($su_id, $today_month){

	      	$sql = "SELECT count(ssi_response_value) AS numbermonthly FROM tbl_sms_sending_info, tbl_business_information WHERE tbl_sms_sending_info.bi_id=tbl_business_information.bi_id AND ssi_status='1' AND tbl_business_information.su_id=$su_id AND MONTH(ssi_inserted)='$today_month'";
	    	$query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }

	    // Yearly SMS sent by individual User
	    function yearly_sms_sent($su_id, $today_year){

	      	$sql = "SELECT count(ssi_response_value) AS numberyearly FROM tbl_sms_sending_info, tbl_business_information WHERE tbl_sms_sending_info.bi_id=tbl_business_information.bi_id AND ssi_status='1' AND tbl_business_information.su_id=$su_id AND YEAR(ssi_inserted)='$today_year'";
	    	$query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->row_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }

	    // Business Wise SMS sent by individual User
     	function business_wise_sms_sent($su_id){
	        
	        $sql = "SELECT *, COUNT(ssi_response_value) FROM tbl_sms_sending_info, tbl_business_information WHERE tbl_sms_sending_info.bi_id = tbl_business_information.bi_id AND tbl_business_information.su_id=$su_id";
	        $query=$this->db->query($sql);
	        if($query -> num_rows()>0){
	            $result = $query->result_array();
	            return $result;
	        }
	        else{
	        	return false;
	        }
	    }// END business_view_all

	}// END class
?>