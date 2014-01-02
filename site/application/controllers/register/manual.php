<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manual extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('register_model');
		
		// set active menu
		Menu::$active_menu = 'register';
		Menu::$active_submenu = 'manual';
		
		// add js file
		$this->_addjs(array(
			'app-register.js'
		));
	}
	
	/**
	 * Check whether dob is a valid date
	 */
	function _check_dob()
	{
		$dob_date  = $this->input->post('dob_date', TRUE);
		$dob_month = $this->input->post('dob_month', TRUE);
		$dob_year  = $this->input->post('dob_year', TRUE);
		
		if(! checkdate($dob_month, $dob_date, $dob_year))
		{
			$this->form_validation->set_message('_check_dob', $this->lang->line('label_dob_invalid'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	/**
	 * Check whether email is available
	 */
	function _check_email()
	{
		$email = $this->input->post('email', TRUE);
		if(! $this->register_model->available_email($email))
		{
			$this->form_validation->set_message('_check_email', $this->lang->line('label_email_unavailable'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function index()
	{
		// define content
		$this->_data['content'] = $this->load->view('register/manual/form', '', TRUE);		
		$this->load->view('default', $this->_data);
	}
	
	function done()
	{
		$reg_code = $this->session->userdata('reg_code');
		if($reg_code != '')
		{
			// get session data
			$data = array(
				'name'  => $this->session->userdata('reg_name'),
				'email' => $this->session->userdata('reg_email'),
				'code'  => $this->session->userdata('reg_code')
			);
			
			// clear session
			$this->session->sess_destroy();
			
			// define content
			$this->_data['content'] = $this->load->view('register/manual/done', $data, TRUE);		
			$this->load->view('default', $this->_data);
		}
		else
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
	
	function failure()
	{
		// define content
		$this->_data['content'] = $this->load->view('register/manual/failure', '', TRUE);		
		$this->load->view('default', $this->_data);
	}
	
	function save()
	{
		$this->form_validation->set_rules('form_id', 'Form ID', 'callback__form_id');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('dob_date', 'dob_date', 'trim|callback__check_dob');
		$this->form_validation->set_rules('dob_month', 'dob_month', 'trim');
		$this->form_validation->set_rules('dob_year', 'dob_year', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__check_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('re_password', 'Re Password', 'trim|matches[password]');
		
		if($this->form_validation->run() !== FALSE)
		{
			$post_data = array(
				'first_name' => $this->input->post('first_name', TRUE),
				'last_name'  => $this->input->post('last_name', TRUE),
				'gender' 	 => $this->input->post('gender', TRUE),
				'dob_date'   => $this->input->post('dob_date', TRUE),
				'dob_month'  => $this->input->post('dob_month', TRUE),
				'dob_year'   => $this->input->post('dob_year', TRUE),
				'email' 	 => $this->input->post('email', TRUE),
				'password' 	 => $this->input->post('password', TRUE)
			);
			
			// parse dob
			$dob  = $post_data['dob_year'];
			$dob .= '-'.(($post_data['dob_month'] < 10) ? '0'.$post_data['dob_month'] : $post_data['dob_month']);
			$dob .= '-'.(($post_data['dob_date'] < 10)  ? '0'.$post_data['dob_date'] : $post_data['dob_date']);
			
			// generate registration id
			$reg_code = md5(microtime());
			
			$save = $this->register_model->save(array(
				'first_name' => $post_data['first_name'],
				'last_name'  => $post_data['last_name'],
				'email'      => $post_data['email'],
				'password'   => $post_data['password'],
				'gender'     => $post_data['gender'],
				'dob'        => $dob,
				'reg_code'   => $reg_code
			));
			
			if($save)
			{
				// send email
				$this->load->model('mailer_model');
				$this->mailer_model->email_registered(array(
					'first_name' => $post_data['first_name'],
					'last_name'  => $post_data['last_name'],
					'email'  	 => $post_data['email'],
					'reg_code'   => $reg_code
				));
				
				$this->session->set_userdata(array(
					'reg_name' => $post_data['first_name'] .' '. $post_data['last_name'],
					'reg_email' => $post_data['email'],
					'reg_code' => $reg_code
				));
				redirect(base_url('register/manual/done'));
			}
			else
			{
				redirect(base_url('register/manual/failure'));
			}
		}
		else
		{
			$this->_data['content'] = $this->load->view('register/manual/form', '', TRUE);
			$this->load->view('default', $this->_data);
		}
	}

}