<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->view_data['base_url'] =base_url();
		
		$this->load->model('Comment_model');
		$baseurl = base_url();
		
    }
	public function index(){
	
	}
	function add(){
		$post_data = file_get_contents("php://input");
		$post_data = json_decode($post_data,true);
		
		$jobId = $post_data['jobId'];
		$userId = $post_data['userId'];
		$jobComment = $post_data['jobComment'];
		
		$result = $this->Comment_model->add($jobId, $userId, $jobComment);
		echo $result;	
	}
	function getAll(){
		$jobId = $this->input->post('jobId');
		$result = $this->Comment_model->getAll($jobId);
		$commentA =array();
		foreach ($result->result() as $row){
			$resultA = array(
				"jobCommentId" => $row->job_comment_id,
				"jobId" => $row->job_id,
				"userId" => $row->user_id,
				"jobComment" => $row->job_comment,
				"postedOn" => $row->posted_on
			);
			array_push($commentA, $resultA);
		}
		echo json_encode($commentA);
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

/* End of file comment.php */
/* Location: ./application/controllers/welcome.php */