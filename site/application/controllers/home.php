<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'job_model'
		));		
	}

	function index()
	{
		$vars = array(
			'locations' => $this->job_model->locations()
		);
		
		$this->_data['content'] = $this->load->view('home/front', $vars, TRUE);
		$this->load->view('default', $this->_data);
	}
	
	
}