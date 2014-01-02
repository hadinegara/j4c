<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model(array(
			'login_model',
			'company_model'
		));
		
		Menu::$active_menu = 'company';
		Menu::$active_submenu = 'login';
	}
	
	function index()
	{
		$this->_data['content'] = $this->load->view('company/login', '', TRUE);
		$this->load->view('default', $this->_data);		
	}
	
	function _test_login()
	{
		$email    = $this->input->post('login_email', TRUE);
		$password = $this->input->post('login_password', TRUE);
		
		$login = $this->login_model->company_test_login($email, $password);
		if($login['status'] == FALSE)
		{
			$this->form_validation->set_message('_test_login', $login['message']);
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function test()
	{
		$this->form_validation->set_rules('form_id', 'Form ID', 'callback__form_id');
		$this->form_validation->set_rules('login_email', 'Email', 'trim|required|callback__test_login');
		$this->form_validation->set_rules('login_password', 'Password', 'trim');
		
		if($this->form_validation->run() !== FALSE)
		{
			// get company info
			$info = $this->company_model->get_info($this->input->post('login_email', TRUE));
			if($info !== FALSE)
			{
				$this->session->unset_userdata(array('private_key'=>''));
				$this->session->set_userdata(array_merge(
					array('company_login_id' => md5($this->input->post('login_password', TRUE))),
					$info
				));
				redirect(base_url('company/posted_job'));
			}
			else
			{
				$this->_data['content'] = $this->load->view('company/login', '', TRUE);
				$this->load->view('default', $this->_data);		
			}
		}
		else
		{
			$this->_data['content'] = $this->load->view('company/login', '', TRUE);
			$this->load->view('default', $this->_data);		
		}		
	}
	
}