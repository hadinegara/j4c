<?php 

class Resume_model extends CI_Model {

	/**
	 * Save language
	 * 
	 * @param 	mixed data
	 * @return 	boolean
	 */
	function save_language($data=array())
	{
		if($data == '' || count($data) == 0)
			return FALSE;
			
		// check whether seeker_id is already exists		
		$seeker_id = @$data[0]['seeker_id'];
		
		// if exists, delete it
		$check = $this->db->where('seeker_id', $seeker_id)->count_all_results('language');
		if($check >= 1)
			$this->db->delete('language', array('seeker_id'=>$seeker_id));
		
		// insert new skills
		$save = $this->db->insert_batch('language', $data);			
		return ($save) ? TRUE : FALSE;
	}
    
	/**
	 * Save skills
	 * 
	 * @param 	mixed data
	 * @return 	boolean
	 */
	function save_skills($data=array())
	{
		if($data == '' || count($data) == 0)
			return FALSE;
			
		// check whether seeker_id is already exists		
		$seeker_id = @$data[0]['seeker_id'];
		
		// if exists, delete it
		$check = $this->db->where('seeker_id', $seeker_id)->count_all_results('skill');
		if($check >= 1)
			$this->db->delete('skill', array('seeker_id'=>$seeker_id));
		
		// insert new skills
		$save = $this->db->insert_batch('skill', $data);			
		return ($save) ? TRUE : FALSE;
	}
    
	/**
	 * Update personal info
	 * 
	 * @param mixed $data
	 * @param int $seeker_id
	 * @return boolean
	 */
	function update_personal_info($data=array(), $seeker_id='')
	{
		if(! $data || ! $seeker_id)
			return FALSE;
		
		return $this->db->update('seeker', $data, array('seeker_id'=>$seeker_id));
	}	

}