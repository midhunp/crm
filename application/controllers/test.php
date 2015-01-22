<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct()
 	{
   		parent::__construct();
		$this->load->model('pages_model');
 	}
	public function index()
	{
			}	
	
	public function hi(){
		echo $this->uri->segment(3);
		echo "hi";
	}
	public function bye(){	
		$username = $this->input->post('username');
		echo $username;
		echo "bye";
	}
	
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */