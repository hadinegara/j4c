<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posted_job extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		Menu::$active_menu = 'company';
		Menu::$active_submenu = 'posted_job';
		
		$this->load->model(array(
			'job_model'
		));
		
		$this->_addjs(array(
			'app.modal.js',
			'app-company.js'
		));
	}
	
	function delete()
	{
		$job_id = $this->input->get('id', TRUE);
		$job_id = ($job_id != '') ? dec($job_id) : (isset($this->job_id) ? $this->job_id : '');
		
		$delete = TRUE;
		if($delete)
			$message = $this->lang->line('msg_job_deleted');
		else
			$message = $this->lang->line('msg_job_delete_failure');
		
		$this->session->set_flashdata(array(
			'flashdata' => $message,
			'alert_status' => ($delete == TRUE) ? 'success' : 'error'
		));
		redirect(base_url('company/posted_job'));
	}
	
	function edit()
	{
		$this->_addcss(array(
			assets_url('libs/jquery/datepicker/datepicker.css')
		));
		
		$this->_addjs(array(
			assets_url('libs/jquery/datepicker/datepicker.js')
		));
		
		$job_id = $this->input->get('id', TRUE);
		$job_id = ($job_id != '') ? dec($job_id) : (isset($this->job_id) ? $this->job_id : '');
		
		$job_detail = $this->job_model->job_detail($job_id);
		if($job_detail != FALSE)
		{
			// set error delimiter
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
			
			$vars = array(
				'job_id'	 => $job_id,
				'job_detail' => $job_detail,
				'categories' => $this->job_model->categories(),
				'locations'  => $this->job_model->locations()
			);
			
			$content = '';		
			$content .= $this->load->view('company/tab', array('active_tab'=>'posted_job'), TRUE);
			$content .= $this->load->view('company/posted_job_edit', $vars, TRUE);
			
			$this->_data['content'] = $content;
			$this->load->view('default', $this->_data);		
		}
		else
		{
			show_404();
		}
	}
	
	function failure()
	{
		$content = '';		
		$content .= $this->load->view('company/tab', array('active_tab'=>'posted_job'), TRUE);
		$content .= $this->load->view('company/posting_job_failure', '', TRUE);
		
		$this->_data['content'] = $content;
		$this->load->view('default', $this->_data);
	}
	
	function index()
	{
		// content
		$content = '';
		
		// tab
		$content .= $this->load->view('company/tab', array('active_tab'=>'posted_job'), TRUE);
		
		// main content
		$company_id = $this->session->userdata('company_id');
		
		$vars = array(
			// get posted job
			'posted_job' => $this->job_model->posted_job($company_id)
		);
		$content .= $this->load->view('company/posted_job', $vars, TRUE);
		
		$this->_data['content'] = $content;
		$this->load->view('default', $this->_data);		
	}
	
	function save_edited()
	{
		$this->load->library('form_validation');
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
			$post_data['requirement'] = json_encode($post_data['requirement']);
			
			// other/ not registered category
			if(isset($_POST['category_other']) && $_POST['category_other'] != '')
				$post_data['category'] = $this->input->post('category_other', TRUE);
			
			// other/ not registered location
			if(isset($_POST['location_other']) && $_POST['location_other'] != '')
				$post_data['location'] = $this->input->post('location_other', TRUE);
			
			// reset date_close
			$dates = explode('-', $post_data['date_close']);
			$post_data['date_close'] = implode('', array_reverse($dates));
			
			// save job
			$job_id = $this->input->post('job_id', TRUE);
			$save = $this->job_model->save_edited_job($post_data, $job_id);
			if($save)
			{
				echo $this->lang->line('label_job_saved') .' -- '. $this->lang->line('label_redirecting').'...';
				$this->session->set_flashdata('flashdata', $this->lang->line('msg_edit_job_saved'));
				redirect(base_url('company/posted_job'));
			}
			else
			{
				redirect(base_url('company/posted_job/failure'));
			}
		}
		else
		{
			$this->job_id = $this->input->post('job_id');
			$this->edit();
		}	
	}
	
	function set_status()
	{
		$param = $this->input->get('p');
		$status = trim(strtolower(substr($param, strpos($param, '-')+1)));
		if($status == 'publish' || $status == 'reject')
		{
			$job_id = dec(str_replace('-'.$status, '', $param));
			$this->job_model->set_status($job_id, $status);
			
			$back_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url('company/posted_job');
			redirect($back_url);
		}
		else
		{
			show_404();
		}
	}
	
}