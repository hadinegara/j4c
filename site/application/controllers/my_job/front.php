<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		// set active menu
		Menu::$active_menu = 'my_job';
		Menu::$active_submenu = 'front';
	}
	
	function index()
	{
		// define content
		$this->_data['content'] = $this->load->view('my_job/front', '', TRUE);		
		$this->load->view('default', $this->_data);	
	}

}
