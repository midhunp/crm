<?php
Class Client_model extends CI_Model
{
 	function add($firstName, $lastName, $phone, $email, $tollFreeId, $computerBrandId, $computerCountHome, $computerCountSubscribed, $operatingSystemId, $antivirusBrandId, $antivirusExpDate){
		//$sha1_password = sha1($password);
		$this->db->set('first_name', $firstName);
		$this->db->set('last_name', $lastName);
		$this->db->set('email', $email);
		$this->db->set('phone', $phone);
		$this->db->set('toll_free_id', $tollFreeId);
		$this->db->set('computer_brand_id', $computerBrandId);
		$this->db->set('computer_count_home', $computerCountHome);
		$this->db->set('computer_count_subscribed', $computerCountSubscribed);
		$this->db->set('operating_system_id', $operatingSystemId);
		$this->db->set('antivirus_brand_id', $antivirusBrandId);
		$this->db->set('antivirus_exp_date', $antivirusExpDate);
		$result = $this->db->insert('client');
		return $result;
	}
	
	
	function is_email_available($_email){
		$this->db->select('email');
		$this->db->where('email', $_email);
		$result = $this->db->get('client');
		if($result->num_rows()>0){
			return false;
		}
		return true;
	}
	
	function confirm_user_registration($activation_code){
		$this->db->select('id');
		$this->db->where('activation_code', $activation_code);;
		$result = $this->db->get('users');
		if($result->num_rows() == 1){
			$data = array(
				   'activated' => 1
				);
	
			$this->db->where('activation_code', $activation_code);
			$this->db->update('users', $data);
			return true;
		}
		return false;
	}
	
	function getDetails($field, $value){
		$this->db->select('client_id, first_name, last_name, email, phone');
		switch($field){
			case 'email':
				$this->db->where('email', $value);
				break;	
			case 'id':
				$this->db->where('client_id', $value);
				break;
		}
		$result = $this->db->get('client');
		if( $result->num_rows() == 1 ){
			return $result;
		}
		return FALSE;
	}
	function getLastClientId($userId){
		$this->db->select('SELECT MAX(client_id) AS client_id');
		$this->db->where('user_id', $userId);
		$result = $this->db->get('client');
		if($result->num_rows() == 1){
			return $result; 
		}
		return false;
	}
	function getTotalClientCount(){
		$result=$this->db->query('SELECT COUNT(*) as totalClient FROM client');
		return $result->row(0)->totalClient; 
		
	}
	function getSubscribedClientCount(){
		$result=$this->db->query('SELECT DISTINCT client_id FROM plan');
		return $result->num_rows(); 
		
	}
}

/* End of file client_model.php */
/* Location: ./application/models/user.php */