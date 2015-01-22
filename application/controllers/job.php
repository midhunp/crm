<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Job_model');
		$this->load->model('Plan_model');
		$this->load->model('Client_model');
		$baseurl = base_url();
		
    }
	public function index(){
		//$this->load->view('welcome_message');
		
		//$this->load->view('chat');
		//$this->load->view('about_us');
	}
	
	function add(){
		
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
					"success" => 0
					);	
		}
		echo json_encode($resultA);
	}
	
	function search(){
		$field = $this->input->post('field');
		$value = $this->input->post('value');
		
		$result = $this->Job_model->search($field, $value);
		
		$jobsA =array();
		if($result){
			foreach ($result->result() as $row){
			  	$jobA = array(
					"jobId" => $row->job_id,
					"createdDate" => $row->created_date,
					"issueTypeId" => $row->issue_type_id,
					"jobStatusId" => $row->job_status_id,
					"firstName" => $row->first_name,
					"lastName" => $row->last_name,
					"phone" => $row->phone,
					"clientId" => $row->client_id
					);
				array_push($jobsA, $jobA);
			}
		}else{
			$jobsA = array(
					"success" => 0
					);
		}
		echo json_encode($jobsA);
	}
	
	function advanceSearch(){
		$minDateS = $this->input->post('minDate');
		$maxDateS = $this->input->post('maxDate');
		//$minDateS ="2014-11-24 12:06:08";
		//$maxDateS ="2014-11-27 17:35:18";
		
		$result = $this->Job_model->advanceSearch($minDateS, $maxDateS);
		
		$jobsA =array();
		if($result){
			foreach ($result->result() as $row){
			  	$jobA = array(
					"jobId" => $row->job_id,
					"createdDate" => $row->created_date,
					"issueTypeId" => $row->issue_type_id,
					"jobStatusId" => $row->job_status_id,
					"firstName" => $row->first_name,
					"lastName" => $row->last_name,
					"phone" => $row->phone,
					"clientId" => $row->client_id
					);
				array_push($jobsA, $jobA);
			}
		}else{
			$jobsA = array(
					"success" => 0
					);
		}
		echo json_encode($jobsA);
	}
	function getDetails(){
		$jobId = $this->input->post('jobId');
		$result = $this->Job_model->getDetails($jobId);
		
		$jobDetailsA =array();
		if($result){
			foreach ($result->result() as $row){
			  	$jobDetailsA = array(
					"jobId" => $row->job_id,
					"userId" => $row->user_id,
					"technicianId" => $row->technician_id,
					"issueTypeId" => $row->issue_type_id,
					"otherIssue" => $row->other_issue,
					"dispositionId" => $row->disposition_id,
					"jobComment" => $row->comment,
					"jobStatusId" => $row->job_status_id,
					"jobCreatedDate" => $row->job_created_date,
					"clientId" => $row->client_id,
					"clientFirstName" => $row->client_first_name,
					"clientLastName" => $row->client_last_name,
					"clientEmail" => $row->client_email,
					"clientPhone" => $row->client_phone,
					"tollFreeId" => $row->toll_free_id,
					"planId" => $row->plan_id,
					"plansId" => $row->plans_id,
					"planStartDate" => $row->plan_start_date,
					"planEndDate" => $row->plan_end_date,
					"planRemaingDays" => $this->Plan_model->getRemainingDays($row->plan_end_date)
					
				);
			}
			
		}
		echo json_encode($jobDetailsA);
	}
	
	function getIssueType(){
			$result = $this->Job_model->getIssueType();
			$issueTypeA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->issue_type_id,
					"name" => $row->issue_type_name,
					);
				array_push($issueTypeA, $resultA);
			}
			echo json_encode($issueTypeA);
	}
	function getAntivirusBrand(){
			$result = $this->Job_model->getAntivirusBrand();
			$antivirusA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->antivirus_brand_id,
					"name" => $row->antivirus_brand_name,
					);
				array_push($antivirusA, $resultA);
			}
			echo json_encode($antivirusA);
	}
	function getComputerBrand(){
			$result = $this->Job_model->getComputerBrand();
			$computerA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->computer_brand_id,
					"name" => $row->computer_brand_name,
					);
				array_push($computerA, $resultA);
			}
			echo json_encode($computerA);
	}
	function getOperatingSystem(){
			$result = $this->Job_model->getOperatingSystem();
			$operatingSystemA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->operating_system_id,
					"name" => $row->operating_system_name,
					);
				array_push($operatingSystemA, $resultA);
			}
			echo json_encode($operatingSystemA);
	}
	function getDisposition(){
			$result = $this->Job_model->getDisposition();
			$dispositionA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->disposition_id,
					"name" => $row->disposition_name,
					);
				array_push($dispositionA, $resultA);
			}
			echo json_encode($dispositionA);
	}
	function getTollFree(){
			$result = $this->Job_model->getTollFree();
			$tollFreeA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->toll_free_id,
					"name" => $row->toll_free_name,
					);
				array_push($tollFreeA, $resultA);
			}
			echo json_encode($tollFreeA);
	}
	function getJobStatus(){
			$result = $this->Job_model->getJobStatus();
			$jobStatusA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->job_status_id,
					"name" => $row->job_status_name,
					);
				array_push($jobStatusA, $resultA);
			}
			echo json_encode($jobStatusA);
	}
	function getPlans(){
			$result = $this->Job_model->getPlans();
			$PlansA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->plans_id,
					"name" => $row->plans_name
					);
				array_push($PlansA, $resultA);
			}
			echo json_encode($PlansA);
	}
	function updateStatus(){
			$post_data = file_get_contents("php://input");
			$post_data = json_decode($post_data,true);
			$jobStatusId = $post_data['jobStatusId'];
			$jobId = $post_data['jobId'];
			$result = $this->Job_model->updateStatus($jobId, $jobStatusId);
			echo $result;
	}
	function updateTechnician(){
			$post_data = file_get_contents("php://input");
			$post_data = json_decode($post_data,true);
			$technicianId = $post_data['technicianId'];
			$jobId = $post_data['jobId'];
			$result = $this->Job_model->updateTechnician($jobId, $technicianId);
			echo $result;
	}
	
	function getDashboardData(){
			$post_data = file_get_contents("php://input");
			$post_data = json_decode($post_data,true);
			$userId = $this->session->userdata('userId');
			$roleId = $this->session->userdata('roleId');
			//$result = $this->Job_model->getDashboardData($userId, $roleId);
			$dashboardA =array();
			$totalClients = $this->Client_model->getTotalClientCount();
			$subscribedClients = $this->Client_model->getSubscribedClientCount();
			$openJobs = $this->Job_model->getOpenJobCount($userId, $roleId);
			$reopenJobs = $this->Job_model->getReopenJobCount($userId, $roleId);
			$compleatedJobs = $this->Job_model->getCompleatedJobCount($userId, $roleId);
			$closedJobs = $this->Job_model->getClosedJobCount($userId, $roleId);
			$pendingJobs = $openJobs + $reopenJobs;
			$dashboardA = array(
					"totalClients" => $totalClients,
					"subscribedClients" => $subscribedClients,
					"openJobs" => $openJobs,
					"reopenJobs" => $reopenJobs,
					"compleatedJobs" => $compleatedJobs,
					"closedJobs" => $closedJobs,
					"pendingJobs" => $pendingJobs
				);
			
			echo json_encode($dashboardA);
	}
	function getOpenJobs(){
		$this->getJobList('open');
	}
	function getReopenJobs(){
		$this->getJobList('reopen');
	}
	function getPendingJobs(){
		$this->getJobList('pending');
	}
	function getCompletedJobs(){
		$this->getJobList('completed');
	}
	function getJobList($statusType){
		
		$userId = $this->session->userdata('userId');
		$roleId = $this->session->userdata('roleId');
		
		$result = $this->Job_model->getJobList($statusType, $userId, $roleId);
		
		$jobsA =array();
		if($result){
			foreach ($result->result() as $row){
			  	$jobA = array(
					"jobId" => $row->job_id,
					"createdDate" => $row->created_date,
					"issueTypeId" => $row->issue_type_id,
					"jobStatusId" => $row->job_status_id,
					"firstName" => $row->first_name,
					"lastName" => $row->last_name,
					"phone" => $row->phone,
					"clientId" => $row->client_id
					);
				array_push($jobsA, $jobA);
			}
		}else{
			$jobsA = array(
					"success" => 0
					);
		}
		echo json_encode($jobsA);
	}
	
	/*****************Utility Calls********************/
	function username_not_exists($_username){
		$this->form_validation->set_message('username_not_exists','%s already exists. Please chose different username and try again');
		if($this->Users_model->check_exists_username($_username)){
			return false;	
		}else{
			return true;	
		}
	}
	
	function get_random_string($_length){
		$randomString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, 1) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $_length);

		return $randomString;	
		
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */