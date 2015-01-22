<?php
Class Job_model extends CI_Model
{
 	function add($clientId, $userId, $technicianId, $dispositionId, $issueTypeId, $otherIssue, $comment, $jobStatusId){
		$this->db->set('client_id', $clientId);
		$this->db->set('user_id', $userId);
		$this->db->set('technician_id', $technicianId);
		$this->db->set('disposition_id', $dispositionId);
		$this->db->set('issue_type_id', $issueTypeId);
		$this->db->set('other_issue', $otherIssue);
		$this->db->set('comment', $comment);
		$this->db->set('job_status_id', $jobStatusId);
		$result = $this->db->insert('job');
		if($result){
			return $result;
		}
		return false;
	 
	}
	function getLastInsertedIdByUser($userId){
		$query=$this->db->query("SELECT max(job_id) as job_id FROM job WHERE user_id = $userId"); 
		return $query;
	
	 
	}
	function search($field, $value){
		
		$this->db->select('j.job_id, j.created_date, j.issue_type_id, j.job_status_id, c.first_name, c.last_name, c.phone, c.client_id');
		$this->db->from('client c'); 
		// 
		//$this->db->join('user u', 'j.user_id = u.user_id', 'full');
		switch($field){
			case 'email':
				$this->db->join('job j', 'c.client_id = j.client_id', 'full');
				$this->db->where('c.email',$value);
				break;	
			case 'phone':
				$this->db->join('job j', 'c.client_id = j.client_id', 'full');
				$this->db->where('c.phone',$value);
				break;	
			case 'jobId':
				$this->db->join('job j', 'c.client_id = j.client_id', 'full');
				$this->db->where('j.job_id',$value);
				break;	
		}
		//$this->db->order_by('c.track_title','asc');         
		$query = $this->db->get(); 
		//echo $this->db->last_query();
		if($query->num_rows() != 0){
			//return $query->result_array();
			return $query;
		}
		else{
			return false;
		}	
	}
	function advanceSearch($minDateS, $maxDateS){
		
		$this->db->select('j.job_id, j.created_date, j.issue_type_id, j.job_status_id, c.first_name, c.last_name, c.phone, c.client_id');
		$this->db->from('job j'); 
		// 
		//$this->db->join('user u', 'j.user_id = u.user_id', 'full');
		switch('range'){
			case 'range':
				$this->db->join('client c', 'c.client_id = j.client_id', 'full');
				$this->db->where('j.created_date >= "'.$minDateS.'" AND j.created_date <= "'.$maxDateS.'"', NULL, FALSE);
				break;
		}
		//$this->db->order_by('c.track_title','asc');         
		$query = $this->db->get(); 
		//echo $this->db->last_query();
		if($query->num_rows() != 0){
			//return $query->result_array();
			return $query;
		}
		else{
			return false;
		}	
	}
	function getDetails($jobId){
		$this->db->select('
			j.job_id
			, j.user_id
			, j.technician_id
			, j.issue_type_id
			, j.other_issue
			, j.disposition_id
			, j.comment
			, j.job_status_id
			, j.created_date as job_created_date
			, c.client_id
			, c.first_name as client_first_name
			, c.last_name  as client_last_name
			, c.email as client_email
			, c.phone as client_phone
			, c.toll_free_id
			, c.computer_brand_id
			, p.plan_id
			, p.plans_id
			, plan_start_date
			, plan_end_date
		');
		$this->db->from('job j');
		$this->db->join('client c', 'c.client_id = j.client_id', 'left');
		$this->db->join('plan p', 'p.client_id = j.client_id', 'left');
		$this->db->where('j.job_id',$jobId);
		$result = $this->db->get();
		return $result;
	}
	
	function getIssueType(){
		$this->db->select('issue_type_id, issue_type_name');
		$result = $this->db->get('issue_type');
		return $result;
	}
	function getAntivirusBrand(){
		$this->db->select('antivirus_brand_id, antivirus_brand_name');
		$result = $this->db->get('antivirus_brand');
		return $result;
	}
	function getComputerBrand(){
		$this->db->select('computer_brand_id, computer_brand_name');
		$result = $this->db->get('computer_brand');
		return $result;
	}
	function getOperatingSystem(){
		$this->db->select('operating_system_id, operating_system_name');
		$result = $this->db->get('operating_system');
		return $result;
	}
	function getDisposition(){
		$this->db->select('disposition_id, disposition_name');
		$result = $this->db->get('disposition');
		return $result;
	}
	function getTollFree(){
		$this->db->select('toll_free_id, toll_free_name');
		$result = $this->db->get('toll_free');
		return $result;
	}
	function getJobStatus(){
		$this->db->select('job_status_id, job_status_name');
		$result = $this->db->get('job_status');
		return $result;
	}
	function getPlans(){
		$this->db->select('plans_id, plans_name');
		$result = $this->db->get('plans');
		return $result;
	}
	function updateStatus($jobId,$jobStatusId){
		$this->db->set('job_status_id', $jobStatusId);
		$this->db->where('job_id', $jobId);
		$result = $this->db->update('job');
		return $result;
	 
	}
	function updateTechnician($jobId,$technicianId){
		$this->db->set('technician_id', $technicianId);
		$this->db->where('job_id', $jobId);
		$result = $this->db->update('job');
		return $result;
	}
	
	function getOpenJobCount($userId, $roleId){
		
		$this->db->select('client_id');
		$this->db->where('job_status_id', 1);
		if($roleId !=1){
			$this->db->where('user_id', $userId);
		}
		$result = $this->db->get('job');
		return $result->num_rows(); 
		
	}
	function getReopenJobCount($userId, $roleId){
		$this->db->select('client_id');
		$this->db->where('job_status_id', 2);
		if($roleId !=1){
			$this->db->where('user_id', $userId);
		}
		$result = $this->db->get('job');
		return $result->num_rows();  
		
	}
	function getCompleatedJobCount($userId, $roleId){
		$this->db->select('client_id');
		$this->db->where('job_status_id', 3);
		if($roleId !=1){
			$this->db->where('user_id', $userId);
		}
		$result = $this->db->get('job');
		return $result->num_rows(); 
	}
	function getClosedJobCount($userId, $roleId){
		$this->db->select('client_id');
		$this->db->where('job_status_id', 4);
		if($roleId !=1){
			$this->db->where('user_id', $userId);
		}
		$result = $this->db->get('job');
		return $result->num_rows(); 
	}
	function getJobList($statusType, $userId, $roleId){
		
		$this->db->select('j.job_id, j.created_date, j.issue_type_id, j.job_status_id, c.first_name, c.last_name, c.phone, c.client_id');
		$this->db->from('client c'); 
		$this->db->join('job j', 'c.client_id = j.client_id', 'full');
		if($roleId !=1){
			$this->db->where('user_id', $userId);
		}
		switch($statusType){
			case 'open':
				$this->db->where('job_status_id', 1);	
				break;
			case 'reopen':
				$this->db->where('job_status_id', 2);
				break;
			case 'pending':
				$this->db->where('job_status_id', 1);
				$this->db->or_where('job_status_id', 2);
				
				break;
			case 'completed':
				$this->db->where('job_status_id', 3);
				break;
			
		}
		
		$this->db->where('user_id', $userId);
		
		$result = $this->db->get(); 
		//echo $this->db->last_query();
		if($result->num_rows() > 0){
			//return $query->result_array();
			return $result;
		}
		return false;
	}
	function getJobByClientId($clientId){
		
		$this->db->select('job_id');
		$this->db->where('client_id', $clientId);
		$result = $this->db->get('job');
		if ($result->num_rows() == 0){
				return false;
		} 
		return $result;
		
	}
}


/* End of file user.php */
/* Location: ./application/models/user.php */