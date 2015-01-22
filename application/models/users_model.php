<?php
Class Users_model extends CI_Model
{
 	function add($firstName, $lastName, $email, $phone, $password, $role_id, $active){
		//$sha1_password = sha1($password);
		$this->db->set('first_name', $firstName);
		$this->db->set('last_name', $lastName);
		$this->db->set('email', $email);
		$this->db->set('phone', $phone);
		$this->db->set('password', $password);
		$this->db->set('role_id', $role_id);
		$this->db->set('active', $active);
		$result = $this->db->insert('user');
		if($result){
			return true;
		}
		return false;
	 
	}
	function update($userId, $firstName, $lastName, $email, $phone, $password, $role_id, $active){
		//$sha1_password = sha1($password);
		$this->db->set('first_name', $firstName);
		$this->db->set('last_name', $lastName);
		$this->db->set('email', $email);
		$this->db->set('phone', $phone);
		$this->db->set('password', $password);
		$this->db->set('role_id', $role_id);
		$this->db->set('active', $active);
		$this->db->where('user_id', $userId);
		$result = $this->db->update('user');
		if($result){
			return true;
		}
		return false;
	 
	}
	function updateActive($userId,$active){
		$this->db->set('active', $active);
		$this->db->where('user_id', $userId);
		$result = $this->db->update('user');
		if($result){
			return true;
		}
		return false;
	 
	}
	function check_login($email, $password){
		$this->db->select('user_id, first_name, last_name, email, phone, role_id, active');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$result = $this->db->get('user');
		if( $result->num_rows() == 1 ){
			return $result;
		}
		return false;
		
		
	}
	
	function login($email, $password){
		$this->db->select('id, first_name, last_name, email, phone, role_id, active');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		
		$row = $query->result();
		if( $query->num_rows() == 1 ){
			return $query;
		}
		return FALSE;
		
		
	}
	
	function getAllUser(){
		$this->db->select('user_id, password, first_name, last_name, email, phone, role_id, status_id, active');
		$query = $this->db->get('user');
		$row = $query->result();
		return $query;
		
	}
	
	
	
	
	function is_email_available($_email){
		$this->db->select('email');
		$this->db->where('email', $_email);
		$result = $this->db->get('user');
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
	
	function getDetails($id){
		$this->db->select('user_id, first_name, last_name, email, phone, role_id, status_id, active');
		$this->db->where('user_id', $id);
		$query = $this->db->get('user');
		//echo '$query->num_rows() '.$query->num_rows(). ' id '.$id;
		if( $query->num_rows() == 1 ){
			return $query;
		}
		return FALSE;
	}
	function getRoles(){
		$this->db->select('role_id, role_name');
		$result = $this->db->get('roles');
		return $result;
	}
	function getStatus(){
		$this->db->select('user_status_id, user_status_name');
		$result = $this->db->get('user_status');
		return $result;
	}
	function getTechnician(){
		$this->db->select('user_id, first_name, last_name');
		//$this->db->where('role_id', 2);
		$result = $this->db->get('user');
		return $result;
	}
	function getActiveUser(){
		$this->db->select('user_id, first_name, last_name');
		$this->db->where('active', 1);
		$result = $this->db->get('user');
		return $result;
	}
	function changeStatus($userId, $statusId){
		$this->db->set('status_id', $statusId);
		$this->db->where('user_id', $userId);
		$result = $this->db->update('user');
		if($result){
			return true;
		}
		return false;
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */