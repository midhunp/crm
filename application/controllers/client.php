<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Client_model');
		$baseurl = base_url();
		
    }
	public function index(){
	
	}
	function add(){
		$post_data = file_get_contents("php://input");
		$post_data = json_decode($post_data,true);
		
		$firstName = $post_data['firstName'];
		$lastName = $post_data['lastName'];
		$email = $post_data['email'];
		$phone = $post_data['phone'];
		$tollFreeId = $post_data['tollFreeId'];
		
		$computerBrandId= $post_data['computerBrandId'];
		$computerCountHome= $post_data['computerCountAtHome'];
		$computerCountSubscribed = $post_data['computerCountSubscribed'];
		$operatingSystemId = $post_data['operatingSystemId'];
		$antivirusBrandId = $post_data['antivirusBrandId'];
		$antivirusExpDate = $post_data['antivirusExpDate'];
		if($this->Client_model->is_email_available($email)){
			$result = $this->Client_model->add($firstName, $lastName, $phone, $email, $tollFreeId, $computerBrandId, $computerCountHome, $computerCountSubscribed, $operatingSystemId, $antivirusBrandId, $antivirusExpDate);
		}else{
			$result = false;		
		}
			echo $result;	
	}
	function getDetails(){
		$field = $this->input->post('field');
		$value = $this->input->post('value');
		$result = $this->Client_model->getDetails($field, $value);
		if($result){
			$resultA = array(
				"clientId" =>$result->row(0)->client_id ,
				"firstName" => $result->row(0)->first_name,
				"lastName" => $result->row(0)->last_name,
				"phone" => $result->row(0)->phone,
				"email" => $result->row(0)->email
			);
			echo json_encode($resultA);
		}
	}
	function getLastClientId($userId){
		$result = $this->Client_model->getLastClientId($userId);
		if($result){
			$client_id = $result->row(0)->client_id; 
		}else{
			$client_id = 0;
		}
		return $client_id;
	}
}

/* End of file client.php */
/* Location: ./application/controllers/welcome.php */