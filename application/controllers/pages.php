<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	function __construct()
 	{
   		parent::__construct();
		$this->load->model('pages_model');
 	}
	public function index()
	{
		$header_data = $this->pages_model->app_page();	
		$this->load->view('header',$header_data);
		$this->load->view('footer');
			
		
	}
	
	public function about_us(){	
		$header_data = $this->pages_model->about_page();
		$this->load->view('header_type_2', $header_data);
		$this->load->view('content_about');
		$this->load->view('footer');
	}
	
	public function contact(){
		$header_data = $this->pages_model->contact_page();
		$this->load->view('header_type_2', $header_data);
		$this->load->view('content_contact');
		$this->load->view('footer');
	}
	public function testimonial(){	
		$header_data = $this->pages_model->testimonial_page();	
		$this->load->view('header_type_2',$header_data);
		$this->load->view('content_testimonial');
		$this->load->view('footer');
	}
	public function samples(){	
		$header_data = $this->pages_model->samples_page();	
		$this->load->view('header_type_3',$header_data);
		$this->load->view('content_samples');
		$this->load->view('footer');
	}
	public function terms(){
		$header_data = $this->pages_model->terms_page();
		$this->load->view('header_type_2', $header_data);
		$this->load->view('content_terms');
		$this->load->view('footer');
	}
	public function privacy(){
		$header_data = $this->pages_model->privacy_page();
		$this->load->view('header_type_2', $header_data);
		$this->load->view('content_privacy');
		$this->load->view('footer');
	}
	public function registration(){
		
		$header_data = $this->pages_model->registration_page();	
		
		$this->load->view('header_type_2',$header_data);
		$this->load->view('content_registration');
		$this->load->view('footer');
	}
	
	
	public function login(){	
		$header_data = $this->pages_model->login_page();	
		
		$this->load->view('login',$header_data);
	}
	public function blank(){	
		$header_data = $this->pages_model->login_page();	
		$this->load->view('header',$header_data);
		$this->load->view('left_side');
		$this->load->view('right_side');
		$this->load->view('footer');
		//$this->load->view('dashboard',$header_data);
	}
	public function dashboard(){	
		$header_data = $this->pages_model->app_page();	
		$this->load->view('header',$header_data);
		$this->load->view('left_side');
		$this->load->view('right_side_dashboard');
		$this->load->view('footer');
		//$this->load->view('dashboard',$header_data);
	}
	public function search(){	
		$header_data = $this->pages_model->login_page();	
		$this->load->view('header',$header_data);
		$this->load->view('left_side');
		$this->load->view('right_side_search');
		$this->load->view('footer');
		//$this->load->view('dashboard',$header_data);
	}
	public function add_user(){	
		$header_data = $this->pages_model->login_page();	
		$this->load->view('header',$header_data);
		$this->load->view('left_side');
		$this->load->view('right_side_add_user');
		$this->load->view('footer');
	}
	public function add_client(){	
		$header_data = $this->pages_model->login_page();	
		$this->load->view('header',$header_data);
		$this->load->view('left_side');
		$this->load->view('right_side_add_client');
		$this->load->view('footer');
	}
	
	
	
	public function submit_assignment(){
		
		$header_data = $this->pages_model->submit_assignment_page();	
		
		$this->load->view('header_type_2',$header_data);
		$this->load->view('content_submit_assignment');
		$this->load->view('footer');
	}
	public function chat(){
		
		$this->load->model('pages_model');
		$data = $this->pages_model->registration_page();	
		
		$this->load->view('header_type_2');
		$this->load->view('content_chat');
		$this->load->view('footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */