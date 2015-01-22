<?php
Class Comment_model extends CI_Model
{
 	function add($jobId, $userId, $jobComment){
		//$sha1_password = sha1($password);
		$this->db->set('job_id', $jobId);
		$this->db->set('user_id', $userId);
		$this->db->set('job_comment', $jobComment);
		$result = $this->db->insert('job_comment');
		return $result;
	}
	
	function getAll($jobId){
		$this->db->select('job_comment_id, job_id, user_id, job_comment, posted_on');
		$this->db->where('job_id', $jobId);
		
		$result = $this->db->get('job_comment');
		return $result;
		
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
	
}

/* End of file client_model.php */
/* Location: ./application/models/user.php */