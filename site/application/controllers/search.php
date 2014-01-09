<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'job_model'
		));
		
		$this->_addjs(array(
			assets_url('libs/jquery/highlight/jquery.highlight.js'),
			'app-search.js'
		));
	}
	
	function index()
	{
		if(isset($_POST['search']))
		{
			$url['q'] = url_title($this->input->post('search', TRUE), ' ');
			if($this->input->post('location', TRUE) != '')
				$url['l'] = $this->input->post('location', TRUE);
			
			redirect(base_url('search?'. http_build_query($url)), 'location', 301);
		}
		else
		{
			$q = $this->input->get('q', TRUE);
			$l = $this->input->get('l', TRUE);
			$result = $this->job_model->simple_search($q, $l);
			$vars = array(
				'result' => $result,
				'keyword' => trim("{$q}+{$l}", '+')
			);
			
			$this->_data['content'] = $this->load->view('search/result', $vars, TRUE);
			$this->load->view('default', $this->_data);
		}
	}
	
	function advanced()
	{
		Menu::$active_menu = 'search';
		
		$vars = array(
			'categories' => $this->job_model->categories(),
			'locations'  => $this->job_model->locations()
		);
		
		//echo '<pre>'; print_r($vars['categories']); exit;
		
		$this->_data['content'] = $this->load->view('search/advanced', $vars, TRUE);
		$this->load->view('default', $this->_data);
	}
	
}