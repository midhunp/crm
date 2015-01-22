<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Users_model');
		$baseurl = base_url();
		
    }
	public function index(){
		//$this->load->view('welcome_message');
		
		$this->load->view('chat');
		$this->load->view('about_us');
	}
	public function register(){
		$this->form_validation->set_rules('name','Name', 'trim|required|alpha_numeric[6]|xss_clean');
		$this->form_validation->set_rules('username','Username', 'trim|required|alpha_numeric[6]|strtolower|callback_username_not_exists|xss_clean');
		$this->form_validation->set_rules('password','Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confirm_password','Confirm Password', 'trim|required|matches[password]|xss_clean');
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|xss_clean');
		if($this->form_validation->run()==FALSE){
			
			$this->load->view('header_type_2');
			$this->load->view('content_user_registration',$this->view_data );
			$this->load->view('footer');
		}else{
			$activationCode = $this->get_random_string(10);
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$this->Users_model->register($name, $username, $password, $email, $activationCode);
			//Sending email
			$this->load->library('email');
			$this->email->from('info@link2zenith.com', 'Link@Zenith');
			$this->email->to('midhun_p2002@gmail.com'); 
			$this->email->subject('Email Test');
			$baseurl = base_url();
			$this->email->message('Testing the email class.'.anchor($baseurl.'users/confirm_registration/'.$activationCode, 'Confirm Registration'));	
			echo 'Testing the email class.'.anchor($baseurl.'users/confirm_registration/'.$activationCode, 'Confirm Registration');
		
			if(! $this->email->send()){
				echo "Mail Send";	
			}else{
				
				echo "Failed Send Mail";	
			}
		}
		
	}
	public function confirm_registration(){
		
		$registration_code = $this->uri->segment(3);
		if($registration_code == ''){
			echo"Error"	;
		}
		$registration_confirmed = $this->Users_model->confirm_user_registration($registration_code);
		
		if($registration_confirmed){
				echo "you have successfully registred";
				redirect(base_url(), 'refresh');
		}else{
			
				echo "you have failed to registred";
		}
	}
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->Users_model->check_login($username , $password);
		if(! $result){
			echo "Failed";
		}else{
			//$this->session->set_userdata('logged_in',TRUE);
			//$this->session->set_userdata('user_id',$user_id);
			//$this->session->set_userdata('user_name','Midhun');
			$session_data = array(
								'logged_in' => 'true',
								'user_id' => $result->row(0)->id,
								'user_name' =>$result->row(0)->name
							);
			$this->session->set_userdata($session_data);
     		redirect(base_url(), 'refresh');
		}
	
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
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