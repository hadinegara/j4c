<?php 

class Job_model extends CI_Model {

	/**
	 * Get all job categories
	 * 
	 * @param	void
	 * @return	mixed
	 */
	function categories()
	{
		$get = $this->db->select("b.id, a.id AS parent_id, a.name AS parent_name, b.name")
						->from("category a,category b")
						->where("b.parent_id=a.id AND a.parent_id=0", NULL, FALSE)
						->order_by("parent_name, name")
						->get();
		
		if($get && $get->num_rows()>0)
		{
			$data = array();
			$others = array('a'=>array(), 'b'=>array(), 'c'=>array());
			
			foreach($get->result_array() as $row)
			{
				if(preg_match('/others?/i', $row['parent_name']))
				{
					if(preg_match('/others?/i', $row['name']))
					{
						$others['b'][] = array(
							'id' => $row['id'],
							'parent_id' => $row['parent_id'],
							'name' => $row['name']
						);
					}
					else
					{
						$others['a'][] = array(
							'id' => $row['id'],
							'parent_id' => $row['parent_id'],
							'name' => $row['name']
						);
					}
				}
				else
				{
					if(preg_match('/others?/i', $row['name']))
					{
						$others['c'][$row['parent_name']][] = array(
							'id' => $row['id'],
							'parent_id' => $row['parent_id'],
							'name' => $row['name']
						);
					}
					else
					{
						$data[$row['parent_name']][] = array(
							'id' => $row['id'],
							'parent_id' => $row['parent_id'],
							'name' => $row['name']
						);
					}
				}
			}
			
			foreach($others['c'] as $index=>$tmp_data)
			{
				foreach($tmp_data as $row)
				{
					$data[$index][] = $row;
				}
			}
			
			$data['Others'] = array_merge($others['a'], $others['b']);
			return $data;
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Delete job
	 * 
	 * @param	str job_id
	 * @return	boolean
	 */
	function delete_job($job_id)
	{
		if($job_id == '')
			return FALSE;
		
		return $this->db->delete('job', array('job_id'=>$job_id));
	}
	
	 
	/**
	 * Get job detail
	 * 
	 * @param	str job_id
	 * @return	mixed
	 */
	function job_detail($job_id)
	{
		if($job_id == '')
			return FALSE;
		
		$get = $this->db->select('j.*, c.name AS cp_name, c.description AS cp_description, c.city AS cp_city, c.address AS cp_address, c.country AS cp_country, c.phone AS cp_phone, c.industry AS cp_industry')
						->from('job j, company c')
						->where('c.company_id=j.company_id', NULL, FALSE)
						->where('job_id', $job_id)
						->get();
						
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
	 * Get location
	 * 
	 * @param	void
	 * @return	mixed
	 */
	function locations()
	{
		$get = $this->db->select("id, country, city")
						->order_by("country, city")
						->get('location');
		
		if($get && $get->num_rows()>0)
		{
			$data = array();
			foreach($get->result_array() as $row)
			{
				$data[$row['country']][] = array(
					'id' => $row['id'],
					'city' => $row['city']
				);
			}
			
			return $data;
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Get posted jobs by company
	 * 
	 * @param	string company_id
	 * @return	mixed
	 */
	function posted_job($company_id)
	{
		if($company_id == '')
			return FALSE;
			
		$get = $this->db->select('job_id,job_id AS job_ref_id,title,description,requirement,month_salary,location')
						->select('category,job_type,contract_duration,noj,status,date_close,date_create')
						->select('(SELECT COUNT(seeker_id) FROM job_apply WHERE job_id=job_ref_id) AS seeker_count')
						->where('company_id', $company_id)
						->order_by('date_create DESC, date_modified DESC')
 						->get('job');
		
		if($get && $get->num_rows()>0)
		{
			return $get->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Save edited job
	 * 
	 * @param	mixed data
	 * @param	str job_id
	 * @return	boolean
	 */
	function save_edited_job($data, $job_id)
	{
		if(! is_array($data) || count($data)==0 || $job_id=='')
			return FALSE;
		
		return (boolean)$this->db->update('job', $data, array('job_id'=>$job_id));
	}
	
	/**
	 * Save new job
	 * 
	 * @param	mixed data
	 * @return	boolean
	 */
	function save_new_job($data)
	{
		if(! is_array($data) || count($data)==0)
			return FALSE;
			
		$data['date_create'] = date('YmdHis');
		return (boolean)$this->db->insert('job', $data);
	}
	
	/**
	 * Set Job Status
	 * 
	 * @param	string job_id
	 * @param	string status
	 * @return	boolean
	 */
	function set_status($job_id, $status)
	{
		if($job_id == '' || $status == '')
			return FALSE;
		
		return $this->db->update('job', array('status'=>$status), array('job_id'=>$job_id));
	}
	
	/**
	 * Search job by simple method
	 * 
	 * @param	string query
	 * @param	string location
	 * @return	boolean
	 */
	function simple_search($q='', $l='', $limit=20, $offset=0)
	{
		if($q == '' && $l == '')
			return FALSE;
		
		// like clause
		$or_like = array();
		
		// apply query
		foreach(explode(' ', $q) as $query)
			foreach(array('title', 'requirement', 'category') as $field)
				$or_like[] = "j.{$field} LIKE '%{$query}%'";
		
		// apply query
		if($l != '')
			foreach(explode(' ', $l) as $loc)
				$or_like[] = "j.location LIKE '%{$loc}%'";
		
		$get = $this->db->select('j.*, j.job_id AS job_ref_id, c.company_id, c.name AS company_name')
						->select('(SELECT COUNT(seeker_id) FROM job_apply WHERE job_id=job_ref_id) AS seeker_count')
						->from('job j, company c')
						->where("j.company_id=c.company_id AND j.status='publish' AND (". implode(' OR ', $or_like) .")", NULL, FALSE)
						->order_by('date_close DESC, date_create DESC')
						->limit($limit, $offset)
						->get();
		
		if($get && $get->num_rows()>0)
		{
			return $get->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
}