<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'seeker_model'
		));
		
		// set active menu
		Menu::$active_menu = 'my_job';
		Menu::$active_submenu = 'front';
	}
	
	function index()
	{
		$seeker_id = $this->session->userdata('seeker_id');
	
		$vars = array(
			'applied_jobs' => $this->seeker_model->get_applied_jobs($seeker_id)
		);
	
		// define content
		$this->_data['content'] = $this->load->view('my_job/front', $vars, TRUE);		
		$this->load->view('default', $this->_data);	
	}

}
