<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_action extends CI_Controller {
	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('users_model');
		$this->load->helper('url');
 	}
	public function index()
	{
		$message="";
		//$this->load->view('welcome_message');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$query = $this->users_model->login($email , $password);
		//echo $result . $username .$password;
	
	
		if($query){	
		
			foreach ($query->result() as $row)
			{
				$message = "Welcome ".$row->first_name." !!";
				$this->session->set_userdata('userId',$row->id);
				$this->session->set_userdata('firstName',$row->first_name);
				$this->session->set_userdata('lastName',$row->last_name);
				$this->session->set_userdata('email',$row->email);
				$this->session->set_userdata('school',$row->school);
				$this->session->set_userdata('grade',$row->grade);
				$this->session->set_userdata('isLoggedIn',true);
				
			}
			$this->session->set_userdata('message', $message);
			redirect(base_url());
		}else{
			$message = "Invalid username or password.";
			$this->session->set_userdata('message', $message);
			redirect(base_url()."login");
		}
	}
	
	public function logout()
	{
		$sessionA = array('id' => '', 'email' => '', 'firstName' => '', 'lastName' => '', 'email' => '', 'school' => '', 'grade' => '', 'isLoggedIn'=>'');

		$this->session->unset_userdata($sessionA);
		$this->session->set_userdata('message', "User logged out successfully.");
		redirect(base_url());
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */