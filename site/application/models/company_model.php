<?php 

class Company_model extends CI_Model {

    /**
     * Get all companies
     * @param   void
     * @return  mixed|boolean
     */
    function companies()
    {
        $get = $this->db->select('`company_id`, `name`, `description`, `city`, `address`, `country`, `phone`, `industry`, `registrant_name`, `registrant_email`, `registrant_password`, `reg_code`, `status`, `date_create`')
                        ->order_by('name')
                        ->get('company');
        
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
	 * Get company info by email
	 * @param	string email
	 * @return	mixed
	 */
	function get_info($email)
	{
		if(! $email)
			return FALSE;
			
		$get = $this->db->select('company_id, name AS company_name, registrant_name, registrant_email')
						->where('registrant_email', $email)
						->get('company');
		
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
	 * Register new company
	 * @param	mixed data
	 * @return	boolean
	 */
	function register($data)
	{
		if(! $data)
			return FALSE;
		
		$data['date_create'] = date('YmdHis');
		return $this->db->insert('company', $data);
	}

}