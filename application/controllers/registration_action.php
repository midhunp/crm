<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_action extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('users_model');
		$this->load->helper('url');
 	}
	public function index()
	{
		
		//$this->load->view('welcome_message');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirmPassword = $this->input->post('confirmPassword');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$phone = $this->input->post('phone');
		$school = $this->input->post('school');
		$grade = $this->input->post('grade');
		
		$isEmailAvailableB = $this->users_model->is_email_available($email);
		if($isEmailAvailableB){
			$result = $this->users_model->register_user($email , $password, $firstName , $lastName, $phone , $school, $grade);
			//echo $result . $username .$password;
			if($result){
				$message = "Your registration was successful. Log in to submit your assignment.";
				$this->session->set_userdata('message', $message);
				redirect(base_url()."login");
					
			}else{
				$message = "Oops something went wrong. Try again.";
				$this->session->set_userdata('message', $message);
				redirect(base_url()."registration");
			}
		}else{
				$message = "You have  already registered with us.";
				$this->session->set_userdata('message', $message);
				redirect(base_url()."login");
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/registraton.php */