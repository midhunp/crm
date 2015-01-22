<?php
Class Plan_model extends CI_Model
{
 	function add( $plansId, $clientId, $userId, $planStartDate, $planEndDate){
		$this->db->set('plans_id', $plansId);
		$this->db->set('client_id', $clientId);
		$this->db->set('user_id', $userId);
		$this->db->set('plan_start_date', $planStartDate);
		$this->db->set('plan_end_date', $planEndDate);
		$result = $this->db->insert('plan');
		if($result){
			return $result;
		}
		return false;
	 
	}
	function generateEndDate($planStartDate, $planDays){
		$sql = "SELECT DATE_ADD(? ,INTERVAL ? DAY) AS plan_end_date FROM plans";
		$result = $this->db->query($sql, array($planStartDate, $planDays));
		return $result->row(0)->plan_end_date;
	}
	function getPlanDays($plansId){
		$sql = "SELECT plans_days FROM plans WHERE plans_id = ?";
		$result = $this->db->query($sql, array($plansId));
		return $result->row(0)->plans_days;
	}
	function clientHasExistingPlan($clientId){
		$flagB = false;
		$this->db->select('plan_id');
		$this->db->where('client_id', $clientId);
		$result = $this->db->get('plan');
		if($result->num_rows()>0){
			$flagB = true;
		}
		return $flagB;	
	}
	function getClientPlanId($clientId){
		$result=$this->db->query("SELECT plan_id FROM plan WHERE client_id = $clientId"); 
		return $result->row(0)->plan_id;
	
	 
	}
	function getRemainingDays($endDate){
		$result=$this->db->query("SELECT DATEDIFF('$endDate',CURDATE()) AS date_difference"); 
		$days = $result->row(0)->date_difference;
		$days = ($days >0) ? $days : 0;
		return $days;
	
	 
	}
	
}


/*
SELECT j.job_id, j.created_date, j.issue_type_id, j.job_status_id, u.first_name, u.last_name, u.phone, c.client_id 
FROM job j 
LEFT OUTER JOIN client c
	on j.client_id = c.client_id
LEFT OUTER JOIN user u
	on j.user_id = u.user_id
WHERE u.first_name = 'midhun'
*/

/* End of file user.php */
/* Location: ./application/models/user.php */