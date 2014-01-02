<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manual extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(array(
			'login_model',
			'seeker_model'
		));
		
		Menu::$active_menu = 'login';
		Menu::$active_submenu = 'manual';
	}
	
	function index()
	{
		if($this->session->userdata('email') != '')
		{
			$this->_redirect();
		}
		
		// define content
		$vars = array(
			'login_message' => $this->session->userdata('login_message')
		);
		
		$this->_data['content'] = $this->load->view('login/manual/form', $vars, TRUE);
		$this->load->view('default', $this->_data);		
	}
	
	function _check_recovery()
	{
		if(! isset($this->register_model))
			$this->load->model('register_model');
			
		$email = $this->input->post('recovery_email', TRUE);
		$exist = !(bool)$this->register_model->available_email($email);
		
		if(! $exist)
		{
			$this->form_validation->set_message('_check_recovery', $this->lang->line('label_email_not_registered'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function _redirect()
	{
		$back_url = $this->session->userdata('login_back_url');
		$next_url = ($back_url != '') ? $back_url : base_url('my_job/front');
		$this->session->unset_userdata('login_back_url');
		redirect($next_url);
	}
	
	function _test_login()
	{
		$email    = $this->input->post('login_email', TRUE);
		$password = $this->input->post('login_password', TRUE);
		
		$login = $this->login_model->test_login($email, $password);
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
	
	function recovery()
	{
		// clear active menu
		Menu::$active_menu = '';
		Menu::$active_submenu = '';
		
		// define content
		if(isset($_POST['form_id']))
		{
			$this->form_validation->set_rules('form_id', 'Form ID', 'callback__form_id');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback__check_recovery');
			
			if($this->form_validation->run() !== FALSE)
			{
				// send email
				$this->load->model('mailer_model');
				$send_mail = $this->mailer_model->email_recovery(array(
					'email' => $this->input->post('recovery_email', TRUE)
				));
				if($send_mail)
				{
					redirect(base_url('login/manual/recovery?done=1'));
				}
				else
				{
					$this->_data['content'] = $this->load->view('login/manual/recovery_failure', '', TRUE);
					$this->load->view('default', $this->_data);
				}
			}
			else
			{
				$this->_data['content'] = $this->load->view('login/manual/recovery', '', TRUE);
				$this->load->view('default', $this->_data);
			}
		}
		else
		{
			if(isset($_GET['done']))
			{
				$this->_data['content'] = $this->load->view('login/manual/recovery_done', '', TRUE);
				$this->load->view('default', $this->_data);
			}
			else
			{
				$this->_data['content'] = $this->load->view('login/manual/recovery', '', TRUE);
				$this->load->view('default', $this->_data);
			}
		}
	}
	
	function test()
	{
		$this->form_validation->set_rules('form_id', 'Form ID', 'callback__form_id');
		$this->form_validation->set_rules('email', 'Email', 'trim|callback__test_login');
		$this->form_validation->set_rules('password', 'Password', 'trim');
		
		if($this->form_validation->run() !== FALSE)
		{
			// get seeker info
			$info = $this->seeker_model->get_info($this->input->post('login_email', TRUE));
			if($info !== FALSE)
			{
				$this->session->unset_userdata(array('private_key'=>''));
				$this->session->set_userdata(array_merge(
					array('login_id' => md5($this->input->post('login_password', TRUE))),
					$info
				));
				$this->_redirect();
			}
			else
			{
				$this->session->sess_destroy();
				$this->_data['content'] = $this->load->view('login/manual/form', '', TRUE);
				$this->load->view('default', $this->_data);		
			}
		}
		else
		{
			$this->session->unset_userdata('login_message');
			$this->_data['content'] = $this->load->view('login/manual/form', '', TRUE);
			$this->load->view('default', $this->_data);		
		}		
	}

}