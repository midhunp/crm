<?php
Class Report_model extends CI_Model
{
 	function advanceSearch($minDateS, $maxDateS){
		
		$this->db->select('j.job_id
			, j.created_date
			, j.issue_type_id
			, j.job_status_id
			, c.first_name
			, c.last_name
			, c.phone
			, c.client_id, tf.toll_free_name
			, cb.computer_brand_name
			, c.computer_count_home
			, c.computer_count_subscribed
			, os.operating_system_name,
			, ab.antivirus_brand_name,
			, c.antivirus_exp_date
		');
		$this->db->from('job j'); 
		$this->db->join('client c', 'c.client_id = j.client_id', 'full');
		$this->db->join('toll_free tf', 'tf.toll_free_id = c.toll_free_id', 'full');
		$this->db->join('computer_brand cb', 'cb.computer_brand_id = c.computer_brand_id', 'full');
		$this->db->join('operating_system os', 'os.operating_system_id = c.operating_system_id', 'full');
		$this->db->join('antivirus_brand ab', 'ab.antivirus_brand_id = c.antivirus_brand_id', 'full');
				
		switch('range'){
			case 'range':
				$this->db->where('j.created_date >= "'.$minDateS.'" AND j.created_date <= "'.$maxDateS.'"', NULL, FALSE);
				break;
		}
		//$this->db->order_by('c.track_title','asc');         
		$query = $this->db->get(); 
		//echo $this->db->last_query();
		if($query->num_rows() != 0){
			//return $query->result_array();
			return $query;
		}
		else{
			return false;
		}	
	}
}


/*
SELECT j.job_id, j.created_date, j.issue_type_id, j.job_status_id, u.first_name, u.last_name, u.phone, c.client_id 
FROM job j 
LEFT OUTER JOIN client c
	on j.client_id = c.client_id
LEFT OUTER JOIN user u
	on j.user_id = u.user_id
WHERE u.first_name = 'midhun'
*/

/* End of file user.php */
/* Location: ./application/models/user.php */