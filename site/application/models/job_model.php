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
	 * Get applied resumes for logged company
	 * 
	 * @param	company_id
	 * @return	boolean
	 */
	function get_applied_resumes($company_id)
	{
		if(! $company_id)
			return FALSE;
		
		$get = $this->db->select('job_id,title,date_create,date_close')
						->select('(SELECT COUNT(job_apply_id) FROM job_apply WHERE job_id=job.job_id) AS num_resume')
						->from('job')
						->where('company_id', $company_id)
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
    
    function get_by_company($company_id, $limit=20, $offset=0)
    {
		if(! $company_id)
			return FALSE;
		
		$get = $this->db->select('j.*, j.job_id AS job_ref_id, c.company_id, c.name AS company_name')
						->select('(SELECT COUNT(seeker_id) FROM job_apply WHERE job_id=job_ref_id) AS seeker_count')
						->from('job j, company c')
						->where("j.company_id=c.company_id AND j.status='publish' AND j.company_id='{$company_id}'", NULL, FALSE)
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
	
    function get_by_location($location, $limit=20, $offset=0)
    {
		if(! $location)
			return FALSE;
            
        $location = preg_replace('/[^a-z0-9]/i', ' ', $location);
		$get = $this->db->select('j.*, j.job_id AS job_ref_id, c.company_id, c.name AS company_name')
						->select('(SELECT COUNT(seeker_id) FROM job_apply WHERE job_id=job_ref_id) AS seeker_count')
						->from('job j, company c')
						->where("j.company_id=c.company_id AND j.status='publish' AND j.location='{$location}'", NULL, FALSE)
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
	
    function get_by_specialization($spec_id, $limit=20, $offset=0)
    {
		if(! $spec_id)
			return FALSE;
            
		$get = $this->db->select('j.*, j.job_id AS job_ref_id, c.company_id, c.name AS company_name')
						->select('(SELECT COUNT(seeker_id) FROM job_apply WHERE job_id=job_ref_id) AS seeker_count')
						->from('job j, company c')
						->where("j.company_id=c.company_id AND j.status='publish'", NULL, FALSE)
                        ->where_in('j.category', $spec_id)
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
    
	function get_popular($limit=5)
	{
		$get = $this->db->select('count(*) as nums_apply, j.*, c.name as company_name')
						->from('job_apply ja')
						->join('job j', 'ja.job_id=j.job_id', 'left')
						->join('company c', 'j.company_id=c.company_id', 'left')
						->group_by('ja.job_id')
						->order_by('nums_apply DESC')
						->where('j.date_create > DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)', NULL, FALSE)
						->limit($limit)
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
    
    function get_spec_detail($spec_id)
    {
        if(! $spec_id)
            return FALSE;
        
        $get = $this->db->where('id', $spec_id)
                        ->or_where('parent_id', $spec_id)
                        ->get('category');
        
        if($get && $get->num_rows() > 0)
        {
            $result = array();
            $childs = array();
            $list_id = array();
            foreach($get->result_array() as $row)
            {
                $list_id[] = $row['id'];
                if($row['parent_id'] == 0)
                {
                    $result = $row;
                }
                else
                {
                    $childs[] = $row;
                }
            }
            
            if(count($result) == 0 && count($childs) > 0)
            {
                $get = $this->db->get_where('category', array('id'=>$childs[0]['parent_id']));
                $result = $get->row_array();
                $list_id[] = $result['id'];
            }
            
            $result['childs'] = $childs;
            $result['list_id'] = $list_id;
            
            return $result;
        }
        else
        {
            return FALSE;
        }
    }
	
	/**
	 * Check whether current job is applied by current seeker
	 * 
	 * @param	job_id
	 * @param	seeker_id
	 * @return	boolean
	 */
	function is_applied($job_id, $seeker_id)
	{
		if(! $job_id || ! $seeker_id)
			return FALSE;
		
		$num = $this->db->where(array('job_id'=>$job_id, 'seeker_id'=>$seeker_id))
						->count_all_results('job_apply');
		return ($num > 0) ? TRUE : FALSE;
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
        $or_like[] = "c.name='{$q}'";
		
		// apply query
		foreach(explode(' ', $q) as $query)
        {
            if(! preg_match('/pt\.?/i', $query))
            {
    			foreach(array('title', 'requirement', 'category') as $field)
                {
    				$or_like[] = "j.{$field} LIKE '%{$query}%'";
                }
            }
        }
        
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
    
    function summaries()
    {
        $summary = array(
            'company'  => array(),
            'location' => array(),
            'category' => array()
        );
        
        // get summaries basaed on company
        $getc = $this->db->query('SELECT company_id,COUNT(job_id) AS nums FROM job GROUP BY company_id ORDER BY nums');
        if($getc && $getc->num_rows()>0)
        {
            foreach($getc->result_array() as $row)
            {
                $summary['company'][$row['company_id']] = (int)$row['nums'];
            }
        }
        
        // get summaries basaed on location
        $getl = $this->db->query('SELECT location,COUNT(job_id) AS nums FROM job GROUP BY location ORDER BY nums');
        if($getl && $getl->num_rows()>0)
        {
            foreach($getl->result_array() as $row)
            {
                $summary['location'][$row['location']] = (int)$row['nums'];
            }
        }
        
        // get summaries basaed on category
        $gets = $this->db->query('SELECT category,COUNT(job_id) AS nums FROM job GROUP BY category ORDER BY nums');
        if($gets && $gets->num_rows()>0)
        {
            foreach($gets->result_array() as $row)
            {
                $summary['category'][$row['category']] = (int)$row['nums'];
            }
        }
        
        return $summary;
    }
	
}