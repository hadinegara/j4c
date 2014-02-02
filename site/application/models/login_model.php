<?php 

class Login_model extends CI_Model {

	/**
	 * Test login for Company
	 * @param	string email address
	 * @param	string password
	 * @return	boolean
	 */
	function company_test_login($email, $password)
	{
		if($email == '' || $password == '') 
		{
			return array(
				'status' => FALSE,
				'message' => lang('label_login_empty')
			);
		}
		
		$get = $this->db->select('status')
						->where(array('registrant_email'=>$email, 'registrant_password'=>$password))
						->get('company');
		
		if($get && $get->num_rows()>0)
		{
			$row = $get->row_array();
			$status = ($row['status'] == 'active');
			$message = lang('label_login_status_'. $row['status']);
			
			return array(
				'status' => $status,
				'message' => $message
			);
		}
		else
		{
			return array(
				'status' => FALSE,
				'message' => lang('label_login_invalid')
			);
		}
	}
	
	/**
	 * Test login
	 * @param	string email address
	 * @param	string password
	 * @return	boolean
	 */
	function test_login($email, $password)
	{
		if($email == '' || $password == '') 
		{
			return array(
				'status' => FALSE,
				'message' => lang('label_login_empty')
			);
		}
		
		$get = $this->db->select('status')
						->where(array('email'=>$email, 'password'=>$password))
						->get('seeker');
		
		if($get && $get->num_rows()>0)
		{
			$row = $get->row_array();
			$status = ($row['status'] == 'active');
			$message = lang('label_login_status_'. $row['status']);
			
			return array(
				'status' => $status,
				'message' => $message
			);			
		}
		else
		{
			return array(
				'status' => FALSE,
				'message' => lang('label_login_invalid')
			);
		}
	}
    
    /**
     * Update password
     * 
     * @param   string new password
     * @return  boolean
     */
    function update_password($new_password)
    {
        if($new_password == '')
        {
            return FALSE;
        }
        
        $seeker_id = $this->session->userdata('seeker_id');
        return $this->db->update('seeker', array('password'=>$new_password), array('seeker_id'=>$seeker_id));
    }
	
}
