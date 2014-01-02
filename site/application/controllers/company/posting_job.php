<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posting_job extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		Menu::$active_menu = 'company';
		Menu::$active_submenu = 'posting_job';
		
		$this->load->library(array(
			'form_validation'
		));
		
		$this->load->model(array(
			'job_model'
		));
		
		$this->_addcss(array(
			assets_url('libs/jquery/datepicker/datepicker.css')
		));
		
		$this->_addjs(array(
			assets_url('libs/jquery/datepicker/datepicker.js'),
			'app-company.js'
		));
	}
	
	function _check_requirement()
	{
		$req = $this->input->post('requirement');
		if(is_array($req))
		{
			$tmp_val = '';
			foreach($req as $i=>$req_value)
			{
				$tmp_val .= trim($req_value);
			}
			
			if($tmp_val == '')
			{
				$this->form_validation->set_message('_check_requirement', $this->lang->line('label_requirement_empty'));
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		else
		{
			$this->form_validation->set_message('_check_requirement', $this->lang->line('label_requirement_invalid'));
			return FALSE;
		}
	}
	
	function failure()
	{
		$content = '';		
		$content .= $this->load->view('company/tab', array('active_tab'=>'posting_job'), TRUE);
		$content .= $this->load->view('company/posting_job_failure', '', TRUE);
		
		$this->_data['content'] = $content;
		$this->load->view('default', $this->_data);
	}
	
	function index()
	{
		// set error delimiter
		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		
		$vars = array(
			'categories' => $this->job_model->categories(),
			'locations' => $this->job_model->locations()
		);
		
		$content = '';		
		$content .= $this->load->view('company/tab', array('active_tab'=>'posting_job'), TRUE);
		$content .= $this->load->view('company/posting_job', $vars, TRUE);
		
		$this->_data['content'] = $content;
		$this->load->view('default', $this->_data);		
	}
	
	function save()
	{
		$this->form_validation->set_rules('form_id', 		'Form ID', 									'trim|callback__form_id');
		$this->form_validation->set_rules('title', 		  	$this->lang->line('label_job_title'), 		'trim|required');
		$this->form_validation->set_rules('job_type', 	  	$this->lang->line('label_job_type'), 		'trim');
		$this->form_validation->set_rules('description',  	$this->lang->line('label_description'), 	'trim|required');
		$this->form_validation->set_rules('requirement',  	$this->lang->line('label_requirement'), 	'callback__check_requirement');
		$this->form_validation->set_rules('date_close', 	$this->lang->line('label_date_close'), 		'trim|required|callback__check_date');
		$this->form_validation->set_rules('month_salary', 	$this->lang->line('label_month_salary'), 	'trim');
		$this->form_validation->set_rules('category', 	  	$this->lang->line('label_category'), 		'trim');
		$this->form_validation->set_rules('location', 	  	$this->lang->line('label_location'), 		'trim');
		$this->form_validation->set_rules('noj', 		  	$this->lang->line('label_number_of_jobs'), 	'trim');
		
		// contract duration
		if(isset($_POST['contract_duration']))
			$this->form_validation->set_rules('contract_duration', $this->lang->line('label_contract_duration'), 'trim|required');
		
		// other category selected, then add this rule
		if(isset($_POST['category_other']))
			$this->form_validation->set_rules('category_other', $this->lang->line('label_other_category'), 'trim|required');
		
		// other location selected, then add this rule
		if(isset($_POST['location_other']))
			$this->form_validation->set_rules('location_other', $this->lang->line('label_other_location'), 'trim|required');
		
		// run validation rule
		if($this->form_validation->run() != FALSE)
		{
			$post_data = array(
				'title'             => $this->input->post('title', TRUE),
				'job_type'          => $this->input->post('job_type', TRUE),
				'contract_duration' => $this->input->post('contract_duration', TRUE),
				'description'       => $this->input->post('description', TRUE),
				'requirement'       => $this->input->post('requirement', TRUE),
				'date_close'        => $this->input->post('date_close', TRUE),
				'month_salary'      => $this->input->post('month_salary', TRUE),
				'category'          => $this->input->post('category', TRUE),
				'location'          => $this->input->post('location', TRUE),
				'noj'               => $this->input->post('noj', TRUE)
			);
			
			// encode requirement
			$post_data['requirement'] = json_encode(array_filter($post_data['requirement']));
			
			// other/ not registered category
			if(isset($_POST['category_other']) && $_POST['category_other'] != '')
				$post_data['category'] = $this->input->post('category_other', TRUE);
			
			// other/ not registered location
			if(isset($_POST['location_other']) && $_POST['location_other'] != '')
				$post_data['location'] = $this->input->post('location_other', TRUE);
			
			// reset date_close
			$dates = explode('-', $post_data['date_close']);
			$post_data['date_close'] = implode('', array_reverse($dates));
			
			// company id as key constraint on table company
			$post_data['company_id'] = $this->session->userdata('company_id');
			
			// save job
			$save = $this->job_model->save_new_job($post_data);
			if($save)
			{
				echo $this->lang->line('label_job_saved') .' -- '. $this->lang->line('label_redirecting').'...';
				$this->session->set_flashdata('flashdata', $this->lang->line('msg_job_saved'));
				redirect(base_url('company/posted_job'));
			}
			else
			{
				redirect(base_url('company/posting_job/failure'));
			}
		}
		else
		{
			$this->index();
		}
	}
	
}