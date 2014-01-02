<?php 

class Register_model extends CI_Model {

	/**
	 * Check whether registered email is available
	 * @param	string email address
	 * @param	string platform
	 * @return	boolean
	 */
	function available_email($email, $platform='manual')
	{
		$num = $this->db->where(array('email'=>$email, 'reg_platform'=>$platform))
						->count_all_results('seeker');
		
		return ($num == 0) ? TRUE : FALSE;
	}
	
	/**
	 * Save registered seeker
	 * @param	mixed data
	 * @return 	boolean
	 */
	function save($data)
	{
		if(! $data) return FALSE;
		
		$data['date_create'] = date('YmdHis');
		return $this->db->insert('seeker', $data);
	}
	
	/**
	 * Save oauth respond data
	 * 
	 * @param mixed $data
	 * @param string $platform
	 * @return boolean
	 */
	function save_oauth($data=array(), $platform='')
	{
		if(! $data)
			return FALSE;
		
		// init info
		$info = FALSE;
		
		// generate registration id
		$reg_code = md5(microtime());
		
		// filter platform
		$platform = trim(strtolower($platform));
		$this->session->unset_userdata('platform', '');
		$this->session->set_userdata('platform', $platform);
		
		switch($platform)
		{
			case 'facebook':
				$info = array(
					'first_name' => @$data['first_name'],
					'last_name'  => @$data['last_name'],
					'email'      => @$data['email'],
					'address'    => @$data['location']['name'],
					'gender'     => (strtolower(@$data['gender']) == 'male' ? 'M' : 'F'),
					'religion'   => @$data['religion'],
					'reg_code'   => $reg_code,
					'reg_platform'    => $platform,
					'reg_platform_id' => @$data['id']
				);
			break;
			
			case 'googleplus':
				$info = array(
					'first_name' => @$data['name']['givenName'],
					'last_name'  => @$data['name']['familyName'],
					'email'      => @$data['emails'][0]['value'],
					'address'    => @$data['placesLived'][0]['value'],
					'pics'       => @$data['image']['url'],
					'gender'     => (strtolower(@$data['gender']) == 'male' ? 'M' : 'F'),
					'reg_code'   => $reg_code,
					'reg_platform'    => $platform,
					'reg_platform_id' => @$data['id']
				);				
			break;
			
			case 'linkedin':
				$info = array(
					'first_name' => @$data->firstName,
					'last_name'  => @$data->lastName,
					'email'      => @$data->emailAddress,
					'address'    => @$data->location->name,
					'pics'       => @$data->pictureUrl,
					'reg_code'   => $reg_code,
					'reg_platform'    => $platform,
					'reg_platform_id' => @$data->id
				);
			break;
			
			case 'twitter':
				// skip
				// not implemented
			break;
		}
		
		// save login, OAUTH_MODE=LOGIN
		$oauth_mode = $this->session->userdata('OAUTH_MODE');		
		if($oauth_mode == 'LOGIN')
		{
			$user_info = $this->seeker_model->get_info($info['email'], $info['reg_platform']);
			if($user_info !== FALSE)
			{
				$this->session->set_userdata(array_merge(
					array('login_id' => $info['reg_platform_id']),
					$user_info
				));
				
				// reset info
				$info = FALSE;
				
				$this->session->set_userdata('oauth_msg', 'OAUTH_LOGIN_SUCCESS');
				return TRUE;
			}
		}
		
		// save registration
		if($info !== FALSE)
		{
			// check email
			if(! $this->available_email($info['email'], $info['reg_platform']))
			{
				$this->session->unset_userdata('oauth_failure_msg', '');
				$this->session->set_userdata('oauth_failure_msg', $this->lang->line('label_email_unavailable'));
				return FALSE;
			}
			
			$save = $this->save($info);				
			if($save)
			{
				// send email
				$this->load->model('mailer_model');
				$this->mailer_model->email_registered(array(
					'first_name' => $info['first_name'],
					'last_name'  => $info['last_name'],
					'email'  	 => $info['email'],
					'reg_code'   => $reg_code
				));
			
				$this->session->set_userdata(array(
					'reg_name'  => $info['first_name'] .' '. $info['last_name'],
					'reg_email' => $info['email'],
					'reg_code'  => $reg_code
				));
				return TRUE;
			}
			else
			{
				$this->session->unset_userdata('oauth_failure_msg', '');
				$this->session->set_userdata('oauth_failure_msg', $this->lang->line('msg_server_error'));
				return FALSE;
			}
		}
		else
		{
			$this->session->unset_userdata('oauth_failure_msg', '');
			$this->session->set_userdata('oauth_failure_msg', $this->lang->line('msg_register_not_complete'));
			return FALSE;
		}
	}

}