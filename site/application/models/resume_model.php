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
	 * Save reference
	 * 
	 * @param 	mixed $post_data
	 * @return 	boolean FALSE|int id
	 */
	function save_reference($post_data=array())
	{
		if(! is_array($post_data) || count($post_data) == 0)
			return FALSE;
		
		$mode = isset($post_data['mode']) ? $post_data['mode'] : 'add';
		if($mode == 'add')
		{
			// add new reference
			$data = $post_data['data'];
			$data['date_create'] = date('YmdHis');
			$data['seeker_id'] = $post_data['seeker_id'];
			$save = $this->db->insert('reference', $data);
			if($save)
			{
				// get last inserted id
				$get = $this->db->select('reference_id')
								->where(array('date_create'=>$data['date_create'], 'seeker_id'=>$data['seeker_id']))
								->get('reference');
				
				if($get && $get->num_rows()>0)
				{
					$row = $get->row();
					return $row->reference_id;
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			// edit old reference
			$save = $this->db->update('reference', $post_data['data'], array('reference_id'=>$post_data['id']));
			return ($save) ? $post_data['id'] : FALSE;
		}
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