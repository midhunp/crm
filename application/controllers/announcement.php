<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Announcement_model');
		$baseurl = base_url();
		
    }
	public function index(){		
		$this->load->view('');
		$this->load->view('');
	}

	function add(){
			$post_data = file_get_contents("php://input");
			$post_data = json_decode($post_data,true);
			
			$title = $post_data['title'];
			$message = $post_data['message'];
			$userId = $post_data['userId'];
			
			$result = $this->Announcement_model->add($title, $message, $userId);
			if($result){
				echo true;
			}else{
				echo false;
			}
	}
	
	function get(){
		$announcementA = array();
		$userId = $this->session->userdata('userId');
		$result = $this->Announcement_model->get($userId);
		
		foreach ($result->result() as $row)
		{
			$resultA = array(
				"title" => $row-> announcement_title,
				"message" => $row-> announcement_content
				);
			array_push($announcementA, $resultA);
		}
		echo json_encode($announcementA);
	}
	
	function getAll(){
		$announcementA = array();
		$result = $this->Announcement_model->getAll();
		
		foreach ($result->result() as $row)
		{
			$resultA = array(
				"announcmentId" => $row-> announcement_id,
				"title" => $row-> announcement_title,
				"message" => $row-> announcement_content,
				"userId" => $row-> user_id,
				"createdDate" => $row-> created_on,
				);
			array_push($announcementA, $resultA);
		}
		echo json_encode($announcementA);
	}
	function delete(){
		$announcementId = $this->input->post('announcementId');
		$result = $this->Announcement_model->delete($announcementId);
		echo $result;
	}
	function update(){
		$post_data = file_get_contents("php://input");
		$post_data = json_decode($post_data,true);
		
		$userId = $post_data['userId'];
		$firstName = $post_data['firstName'];
		$lastName = $post_data['lastName'];
		$email = $post_data['email'];
		$phone = $post_data['phone'];
		$password = $post_data['password'];
		$role_id = $post_data['role_id'];
		$active = $post_data['active'];
		$result = $this->Users_model->update($userId, $firstName, $lastName, $email, $phone, $password, $role_id, $active);
		if($result){
			echo true;
		}else{
			echo false;	
		}
	}
	function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$result = $this->Users_model->check_login($email , $password);
		if($result){
			$loggedIn = true;
			$userId = $result->row(0)->user_id;
			$roleId = $result->row(0)->role_id;
			$active = $result->row(0)->active;
			$this->changeStatus($userId,1);
		}else{
			$loggedIn = false;
			$userId = 0;
			$roleId = 0;
			$active = 0;
		}
		$session_data = array(
							'loggedIn' => $loggedIn,
							'userId' => $userId,
							'roleId' => $roleId,
							'active' => $active,
						);
		$this->session->set_userdata($session_data);
		echo json_encode($session_data);
	}
	function getDetails(){
		$userId = $this->session->userdata('userId');
		if(!$this->isUndefined($userId)){
			$query = $this->Users_model->getDetails($userId);
			foreach ($query->result() as $row)
			{
			  $resultA = array(
					"isLoggedIn" => true,
					"userId" => $row-> user_id,
					"firstName" => $row->first_name,
					"lastName" => $row->last_name,
					"email" => $row->email,
					"phone" => $row->phone,
					"role_id" => $row->role_id,
					"status_id" => $row->status_id,
					"active" => $row->active,
					);
			echo json_encode($resultA);
			}
		}else{
			$resultA = array(
					"isLoggedIn" => false
					);
			echo json_encode($resultA);
		}
		
	}
	function getUsers(){
		
	
			$query = $this->Users_model->getAllUser();
			$arrayMain =array();
			foreach ($query->result() as $row)
			{
			  $resultA = array(
					"userId" => $row->user_id,
					"password" => $row->password,
					"firstName" => $row->first_name,
					"lastName" => $row->last_name,
					"email" => $row->email,
					"phone" => $row->phone,
					"role_id" => $row->role_id,
					"status_id" => $row->status_id,
					"active" => $row->active
					
					);
				array_push($arrayMain, $resultA);
			
			}
			echo json_encode($arrayMain);
	}
	function getRoles(){
			$result = $this->Users_model->getRoles();
			$rolesA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->role_id,
					"name" => $row->role_name,
					);
				array_push($rolesA, $resultA);
			}
			echo json_encode($rolesA);
	}
	function getStatus(){
			$result = $this->Users_model->getStatus();
			$statusA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->user_status_id,
					"name" => $row->user_status_name,
					);
				array_push($statusA, $resultA);
			}
			echo json_encode($statusA);
	}
	function getTechnician(){
			$result = $this->Users_model->getTechnician();
			$technicianA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->user_id,
					"name" => $row->first_name.' '.$row->last_name,
					);
				array_push($technicianA, $resultA);
			}
			echo json_encode($technicianA);
	}
	function getActiveUser(){
			$result = $this->Users_model->getActiveUser();
			$activeUserA =array();
			foreach ($result->result() as $row)
			{
			  $resultA = array(
					"id" => $row->user_id,
					"name" => $row->first_name.' '.$row->last_name,
					);
				array_push($activeUserA, $resultA);
			}
			echo json_encode($activeUserA);
	}
	function changeStatus($userId, $statusId){
			$result = $this->Users_model->changeStatus($userId, $statusId);
			$flagB = false;
			if($result){
				$flagB = true;
			}
			/*$statusA = array(
					"statusChanged" => $flagB
					);
			
			echo json_encode($statusA);*/
			return $flagB;
	}
/*function sidebarData(){
		$userID = $this->session->userdata('userId');
		echo $userID;
}
*/

/*****************Utility Calls********************/
	function username_not_exists($_username){
		$this->form_validation->set_message('username_not_exists','%s already exists. Please chose different username and try again');
		if($this->Users_model->check_exists_username($_username)){
			return false;	
		}else{
			return true;	
		}
	}
	function isUndefined($variable){
		$flag = false;
		if($variable == ""){
			$flag = true;
		}
		return $flag;	
	}
	function getUserStatus($statusCode){
		$statusS;
		switch($statusCode){
			case 1:
				$statusS = "Offline";
				break;
			case 2:
				$statusS = "online";
				break;
			case 3:
				$statusS = "Busy";
				break;
			default:
				$statusS = "Offline";
		}	
		return $statusS;
	}
	function get_random_string($_length){
		$randomString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, 1) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $_length);

		return $randomString;	
		
		
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */