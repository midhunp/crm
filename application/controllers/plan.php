<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Plan_model');
		$baseurl = base_url();
		
    }
	public function index(){
		//$this->load->view('welcome_message');
		
		//$this->load->view('chat');
		//$this->load->view('about_us');
	}
	
	function add(){
		$post_data=file_get_contents("php://input");
		$post_data =json_decode($post_data,true);
		$plansId = $post_data['plansId'];
		$clientId = $post_data['clientId'];
		$userId = $post_data['userId'];
		$planStartDate = $post_data['planStartDate'];
		$planDays = $this->Plan_model->getPlanDays($plansId);
		$planEndDate = $this->Plan_model->generateEndDate($planStartDate, $planDays);
		$clientHasExistingPlanB = $this->clientHasExistingPlan($clientId);
		if(!$clientHasExistingPlanB){
			$result = $this->Plan_model->add($plansId, $clientId, $userId, $planStartDate, $planEndDate);
			if($result){
				$newPlanId = $this->getClientPlanId($clientId);
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
	/**************UTILITY*****************/
	function clientHasExistingPlan($clientId){
		return $this->Plan_model->clientHasExistingPlan($clientId);	
		
	}
	function getClientPlanId($clientId){	
		return $this->Plan_model->getClientPlanId($clientId);	
		
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */