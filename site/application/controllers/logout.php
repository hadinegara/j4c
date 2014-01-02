<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$platform = $this->session->userdata('reg_platform');
		switch($platform)
		{
			default:
				$this->session->sess_destroy();
				redirect(base_url());
			break;
			
			case 'facebook':
			case 'linkedin':
			case 'googleplus':
				redirect(base_url("oauth/out/{$platform}"), 'refresh');
			break;
		}
	}

}