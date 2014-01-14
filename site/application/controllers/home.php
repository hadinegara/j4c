<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'job_model',
            'company_model'
		));		
	}

	function index()
	{
		$vars = array(
			'companies' => $this->company_model->companies(),
			'locations' => $this->job_model->locations(),
			'error_simple_search' => $this->session->userdata('error_simple_search')
		);
		
		// clear error
		$this->session->unset_userdata('error_simple_search');
		
		$this->_data['content'] = $this->load->view('home/front', $vars, TRUE);
		$this->load->view('default', $this->_data);
	}
	
	
}