<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		Menu::$active_menu = 'company';
		Menu::$active_submenu = 'resume';
		
		$this->load->model(array(
			'job_model',
			'seeker_model'
		));	
		
		$this->_addjs(array(
			'app.modal.js',
			'app-company.js'
		));
	}
	
	function index()
	{
		// content
		$content = '';
		
		// tab
		$content .= $this->load->view('company/tab', array('active_tab'=>'resume'), TRUE);
		
		// main content
		$company_id = $this->session->userdata('company_id');
		
		$vars = array(
			// get applied resumes
			'resumes' => $this->job_model->get_applied_resumes($company_id)
		);
		$content .= $this->load->view('company/resume', $vars, TRUE);
		
		$this->_data['content'] = $content;
		$this->load->view('default', $this->_data);		
	}
	
	
}