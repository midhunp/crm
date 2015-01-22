<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MySiteConfiguration {

	private $siteName = "Link2Zenith";
	
	function __construct()
 	{
	
 	}
	public function index()
	{

	}
	
	public function getSiteName(){
		return $this->siteName;
	}
	
}

/* End of file MySiteConfiguration.php */
/* Location: ./application/libraries/MySiteConfiguration.php */