<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Client_model');
		$this->load->model('Job_model');
		$this->load->model('Plan_model');
		$baseurl = base_url();
		
    }
	public function index(){
	
	}
	function addClient(){
		$post_data = file_get_contents("php://input");
		$post_data = json_decode($post_data,true);
		
		$firstName = $post_data['firstName'];
		$lastName = $post_data['lastName'];
		$email = $post_data['email'];
		$phone = $post_data['phone'];
		$tollFreeId = $post_data['tollFreeId'];
		
		$computerBrandId= $post_data['computerBrandId'];
		$computerCountHome= $post_data['computerCountAtHome'];
		$computerCountSubscribed = $post_data['computerCountSubscribed'];
		$operatingSystemId = $post_data['operatingSystemId'];
		$antivirusBrandId = $post_data['antivirusBrandId'];
		$antivirusExpDate = $post_data['antivirusExpDate'];
		if($this->Client_model->is_email_available($email)){
			$result = $this->Client_model->add($firstName, $lastName, $phone, $email, $tollFreeId, $computerBrandId, $computerCountHome, $computerCountSubscribed, $operatingSystemId, $antivirusBrandId, $antivirusExpDate);
			if($result){
				$resultA = array(
					"clientId" =>$result->row(0)->client_id
				);
			}
		}else{
			$result = $this->Client_model->getDetails('email', $email);
			if($result){
				$resultA = array(
					"clientId" =>$result->row(0)->client_id
				);
			}
		}
			echo json_encode($resultA);	
	}
	
	
	function addJob(){
		
		$post_data = file_get_contents("php://input");
		$post_data = json_decode($post_data,true);
		$clientId = $post_data['clientId'];
		$userId = $post_data['userId'];
		$technicianId = $post_data['technicianId'];
		$dispositionId = $post_data['dispositionId'];
		$issueTypeId = $post_data['issueTypeId'];
		$otherIssue = $post_data['otherIssue'];
		$comment = $post_data['comment'];
		$jobStatusId = ($dispositionId == 2) ? 4 : 1;
		$resultJobByClientId = $this->Job_model->getJobByClientId($clientId);
		if(!$resultJobByClientId){
			$result = $this->Job_model->add($clientId, $userId, $technicianId,$dispositionId, $issueTypeId, $otherIssue, $comment, $jobStatusId);
			if($result){
				$jobidResult = $this->Job_model->getLastInsertedIdByUser($userId);
				if($jobidResult){
					$resultA = array(
						"success" => 1,
						"jobId" => $jobidResult->row(0)->job_id 
						);
				}
					
			}else{
				$resultA = array(
						"success" => 0,
						);	
			}
		}else{
			
			$resultA = array(
					"success" => 1,
					'jobId' => $resultJobByClientId->row(0)->job_id
					);			
		}
		echo json_encode($resultA);
	}
	
	
	function getLastClientId($userId){
		$result = $this->Client_model->getLastClientId($userId);
		if($result){
			$client_id = $result->row(0)->client_id; 
		}else{
			$client_id = 0;
		}
		return $client_id;
	}
	
	function addPlan(){
		$post_data=file_get_contents("php://input");
		$post_data =json_decode($post_data,true);
		$plansId = $post_data['plansId'];
		$clientId = $post_data['clientId'];
		$userId = $post_data['userId'];
		$planStartDate = $post_data['planStartDate'];
		$planDays = $this->Plan_model->getPlanDays($plansId);
		$planEndDate = $this->Plan_model->generateEndDate($planStartDate, $planDays);
		$clientHasExistingPlanB = $this->Plan_model->clientHasExistingPlan($clientId);
		if(!$clientHasExistingPlanB){
			$result = $this->Plan_model->add($plansId, $clientId, $userId, $planStartDate, $planEndDate);
			if($result){
				$newPlanId = $this->Plan_model->getClientPlanId($clientId);
				$resultA = array(
						"success" => 1,
						"planId" => $newPlanId
					);
			}else{
				$resultA = array(
						"success" => 0,
						"error" =>"Faliled to insert data."
						);	
			}
		}else{
			$resultA = array(
						"success" => 0,
						"error" =>"Plan exist for this Client."
						);
		
		}
		echo json_encode($resultA);
	}
}

/* End of file client.php */
/* Location: ./application/controllers/welcome.php */