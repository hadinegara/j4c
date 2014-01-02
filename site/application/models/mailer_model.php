<?php 

class Mailer_model extends CI_Model {

	/**
	 * Send account recovery info to registered email address
	 * @param 	mixed
	 * @return 	boolean
	 */
	function email_recovery($param)
	{
		return $this->db->insert('mailer', array(
			'send_to'     => $param['email'],
			'message_tpl' => 'recovery',
			'status'      => 'pending',
			'date_create' => date('YmdHis')
		));
	}

	/**
	 * Send email to registered company
	 * @param 	mixed
	 * @return 	boolean
	 */
	function email_company_registered($param)
	{
		$email = $param['email'];
		unset($param['email']);
		
		return $this->db->insert('mailer', array(
			'send_to'     => $email,
			'message_tpl' => 'company_registered',
			'param'       => json_encode($param),
			'status'      => 'pending',
			'date_create' => date('YmdHis')
		));
	}
	
	/**
	 * Send email to registered email address
	 * @param 	mixed
	 * @return 	boolean
	 */
	function email_registered($param)
	{
		$email = $param['email'];
		unset($param['email']);
		
		return $this->db->insert('mailer', array(
			'send_to'     => $email,
			'message_tpl' => 'registered',
			'param'       => json_encode($param),
			'status'      => 'pending',
			'date_create' => date('YmdHis')
		));
	}

}