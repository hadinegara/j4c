<?php 

class Seeker_model extends CI_Model {

	/**
	 * Get full info of logged user
	 * @param	seeker_id
	 * @return	mixed|boolean
	 */
	function get_applied_jobs($seeker_id)
	{
		if($seeker_id == '') return FALSE;
	
		$get = $this->db->select('j.*, ja.status_apply, ja.view_count, ja.date_create AS date_apply')
						->from('job j, job_apply ja')
						->where("ja.job_id=j.job_id AND ja.seeker_id={$seeker_id}", NULL, FALSE)
						->get();
		
		if($get && $get->num_rows() > 0)
		{
			return $get->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Get full info of logged user
	 * @param	seeker_id
	 * @return	mixed
	 */
	function get_full_info($seeker_id)
	{
		if($seeker_id == '') return FALSE;
		
		$results = array();
		$tables = array('seeker', 'experience', 'language', 'preference', 'qualification', 'reference', 'skill');
		foreach($tables as $table)
		{
			$get = $this->db->get_where($table, array('seeker_id'=>$seeker_id));
			if($get && $get->num_rows()>0)
				$results[$table] = $get->result_array();
			else
				$results[$table] = FALSE;
		}
		
		return $results;
	}
	
	/**
	 * Get logged user info
	 * @param	string email address
	 * @return	mixed
	 */
	function get_info($email, $platform='manual')
	{
		if($email == '') return FALSE;
		
		$get = $this->db->select('seeker_id, first_name, last_name, email, reg_platform')
						->where(array('email'=>$email, 'reg_platform'=>$platform))
						->get('seeker');
		
		if($get && $get->num_rows()>0)
		{
			return $get->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Get percentage of resume status
	 * @param	seeker id
	 * @return	mixed
	 */
	function get_percentage_status($seeker_id='')
	{
		if($seeker_id == '')
			return FALSE;
		
		$get = $this->db->select("(SELECT COUNT(*) FROM experience WHERE seeker_id=$seeker_id) AS a")
						->select("(SELECT COUNT(*) FROM language WHERE seeker_id=$seeker_id) AS b")
						->select("(SELECT COUNT(*) FROM preference WHERE seeker_id=$seeker_id) AS c")
						->select("(SELECT COUNT(*) FROM qualification WHERE seeker_id=$seeker_id) AS d")
						->select("(SELECT COUNT(*) FROM reference WHERE seeker_id=$seeker_id) AS e")
						->select("(SELECT COUNT(*) FROM skill WHERE seeker_id=$seeker_id) AS f")
						->get();
		
		if($get && $get->num_rows())
		{
			$num = 1;
			foreach($get->row_array() as $k=>$v)
				if($v != 0) $num++;
			
			return round(($num/7)*100);
		}
		else
		{
			return FALSE;
		}
	}

}