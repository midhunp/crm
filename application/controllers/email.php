<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('users_model');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('email');
		$infoEmailAddress = "midhun.p2002@gmail.com";
 	}
	public function index()
	{
		
	}
	
	public function contact()
	{	
	
		$from_name = $this->input->post('name');
		$from_email = $this->input->post('email');
		$from_subject = $this->input->post('subject');
		$from_message = $this->input->post('message');
		
			
		
		$this->email->from($from_email, $from_name);
		$this->email->to("link2zenith.dv@gmail.com"); 
		$this->email->subject($from_subject);
		$this->email->message($from_message);	
		
		 
		if($this->email->send()){
			$message = "We got your request. We will be in touch with you soon.";
			$this->session->set_userdata('message', $message);
			redirect(base_url()."contact");	
		}else{	
			$message = "Oops something went wrong. Try again.";
			$this->session->set_userdata('message', $message);
			redirect("index");
		}
		
		
	}
	
	public function submitAssignment(){

       $config['upload_path']   =   "public/temp/";
       $config['allowed_types'] =   "gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf"; 
       $config['max_size']      =   "2048";
       //$config['max_width']     =   "1907";
       //$config['max_height']    =   "1280";

       $this->load->library('upload',$config);
       if(!$this->upload->do_upload('attachment')){
			//upload failed
           //echo $this->upload->display_errors();
			$message = "Oops something went wrong. Try again.";
			$this->session->set_userdata('message', $message);
			redirect(base_url().'submit_assignment');
       }else{
			//upload success
       		$finfo=$this->upload->data();
		   	$tempFolderPath = $this->config->item('server_root')."/public/temp/";
			
				
			$email="";
			$firstName="";
			$lastName="";
			$school="";
			$grade="";
			
			$userId=$this->session->userdata('userId');
			$email=$this->session->userdata('email');
			$firstName=$this->session->userdata('firstName');
			$lastName=$this->session->userdata('lastName');
			$school=$this->session->userdata('school');
			$grade=$this->session->userdata('grade');
			
				
			//$from_name = $this->input->post('name');
			//$from_email = $this->input->post('email');
			$from_subject = $this->input->post('subject');
			$from_description = $this->input->post('description');
				
			$this->email->from($email, $firstName);
			$this->email->to("link2zenith.dv@gmail.com");
			$this->email->cc('midhun.p2002@gmail.com'); 
			$this->email->subject($from_subject);
			$this->email->message($from_description);
			$this->email->attach($tempFolderPath. $finfo['file_name']);	
			if($this->email->send()){
				$message = "We got your request. We will be in touch with you soon.";
				$this->session->set_userdata('message', $message);
				//echo $this->email->print_debugger();
		   		//delete uploaded file form temp
				$this->deleteFiles($tempFolderPath);
				redirect(base_url());	
			
			}else{	
				$message = "Oops something went wrong. Try again.";
				$this->session->set_userdata('message', $message);
				redirect(base_url());
			}
			
			
       }

    }
	
	public function deleteFiles($path){
		echo $path;
		delete_files($path, TRUE);   
	}
}
	
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */