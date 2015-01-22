<?php
Class Pages_model extends CI_Model
{
	private $companyName ="";
	function __construct(){
        parent::__construct();
		$this -> companyName = "Link2Zenith";
		$this -> seoDescription = "Link2Zenith is the destination for the students and parents who want assistance in homework and academics projects.";
		$this -> seoKeywords = "homwork ,assignment,summer holidays,science projects,working models,3d models,charts,presentations,art and craft,craft from waste material, janakpuri, delhi, tuition";
		$this -> seoAuthor = "Midhun P";
		//$this -> uri_segments = $this->uri->total_segments();
		//$this -> current_page_name = $this->uri->segment($uri_segments);

    }
	function app_page(){
		$this -> title = "Welcome to Link2Zenith";
		return $this;
		
	}
	function about_page(){
		$this -> title = "About Us";
		return $this;
		
	}
	function contact_page(){
		$this -> title = "Contact";
		return $this;
		
	}
	function samples_page(){
		$this -> title = "Samples";
		return $this;
		
	}
	function team_page(){
		$this -> title = "Team";
		return $this;
		
	}
	function faq_page(){
		$this -> title = "Frequently Asked Questions";
		return $this;
		
	}
	function privacy_page(){
		$this -> title = "Privacy Policy";
		return $this;
		
	}
	function testimonial_page(){
		$this -> title = "Tesimonial";
		return $this;
		
	}
	function terms_page(){
		$this -> title = "Terms";
		return $this;
		
	}
	function registration_page(){
		$this -> title = "Registration";
		return $this;
	}
	function login_page(){
		$this -> title = "Login";
		return $this;
	}
	function submit_assignment_page(){
		$this -> title = "Submit Assignment";
		return $this;
	}
}

/* End of file pages_model.php */
/* Location: ./application/models/pages_model.php */