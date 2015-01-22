<?php
Class Announcement_model extends CI_Model
{
 	function add($title, $message, $userId){
		//$sha1_password = sha1($password);
		$this->db->set('announcement_title', $title);
		$this->db->set('announcement_content', $message);
		$this->db->set('user_id', $userId);
		$result = $this->db->insert('announcements');
		return $result;
	 
	}
	function get($userId){
		$this->db->select('announcement_title, announcement_content');
		$this->db->where('user_id', 0);
		$this->db->or_where('user_id', $userId);
		
		$result = $this->db->get('announcements');	
		return $result;
	}
	function getAll(){
		$this->db->select('announcement_id,announcement_title, announcement_content, user_id, created_on');
		$result = $this->db->get('announcements');	
		return $result;
	}
	function delete($announcementId){
		$this->db->where('announcement_id', $announcementId);
		$result = $this->db->delete('announcements');
		return $result;
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
}

/* End of file user.php */
/* Location: ./application/models/user.php */