<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Report_model');
		$baseurl = base_url();
		
    }
	public function index(){
		//$this->load->view('welcome_message');
		
		//$this->load->view('chat');
		//$this->load->view('about_us');
	}
	function advanceSearch(){
		$minDateS = $this->input->post('minDate');
		$maxDateS = $this->input->post('maxDate');
		//$minDateS ="2014-11-24 12:06:08";
		//$maxDateS ="2014-11-27 17:35:18";
		
		$result = $this->Report_model->advanceSearch($minDateS, $maxDateS);
		
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
					"clientId" => $row->client_id,
					"tollFreeName" => $row->toll_free_name,
					"computerBrandName" => $row->computer_brand_name,
					"computerCountHome" => $row->computer_count_home,
					"computerCountSubscribed" => $row->computer_count_subscribed,
					"operatingSystemName" => $row->operating_system_name,
					"antivirusBrandName" => $row->antivirus_brand_name,
					"antivirusExpDate" => $row->antivirus_exp_date
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