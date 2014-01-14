<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		
		$this->load->model(array(
			'company_model',
			'job_model'
		));
		
		Menu::$active_menu = 'company';
		Menu::$active_submenu = 'register';
		
		// add js
		$this->_addjs(array(
			'app-company-register.js'
		));
	}
	
	function index()
	{
		$vars = array(
			'categories' => $this->job_model->categories(),
			'locations' => $this->job_model->locations()
		);
		
		//echo '<pre>'; print_r($vars['categories']); exit;
		
		$this->_data['content'] = $this->load->view('company/register_form', $vars, TRUE);
		$this->load->view('default', $this->_data);		
	}
	
	function done()
	{
		// get registered data
		$data = $this->session->all_userdata();
		if(isset($data['company_reg_name']) && $data['company_reg_name'] != '')
		{
			// clear session
			$this->session->sess_destroy();
			
			$this->_data['content'] = $this->load->view('company/register_done', $data, TRUE);
			$this->load->view('default', $this->_data);		
		}
		else
		{
			redirect(base_url());
		}
	}
		
	function save()
	{
		$this->form_validation->set_rules('form_id', 				$this->lang->line('label_form_id'), 		'trim|callback__form_id');
		$this->form_validation->set_rules('company_name', 			$this->lang->line('label_company_name'), 	'trim|required|is_unique[company.name]');
		$this->form_validation->set_rules('phone', 					$this->lang->line('label_phone'), 			'trim|required');
		$this->form_validation->set_rules('description', 			$this->lang->line('label_description'), 	'trim|required');
		$this->form_validation->set_rules('address', 				$this->lang->line('label_address'), 		'trim|required');
		$this->form_validation->set_rules('city', 					$this->lang->line('label_city'), 			'trim|required');
		$this->form_validation->set_rules('country', 				$this->lang->line('label_country'), 		'trim');
		$this->form_validation->set_rules('industry_name', 			$this->lang->line('label_industry'), 		'trim');
		$this->form_validation->set_rules('registrant_name', 		$this->lang->line('label_registrant_name'), 'trim|required');
		$this->form_validation->set_rules('registrant_email', 		$this->lang->line('label_registrant_name'), 'trim|required|valid_email|is_unique[company.registrant_email]');
		$this->form_validation->set_rules('registrant_password', 	$this->lang->line('label_password'), 		'trim|required');
		$this->form_validation->set_rules('registrant_re_password', $this->lang->line('label_password_re'), 	'trim|required|matches[registrant_password]');
		
		if($this->form_validation->run() != FALSE)
		{
			$post_data = array(
				'name'           	  => $this->input->post('company_name', TRUE),
				'phone'               => $this->input->post('phone', TRUE),
				'description'         => $this->input->post('description', TRUE),
				'address'             => $this->input->post('address', TRUE),
				'city'                => $this->input->post('city', TRUE),
				'country'             => $this->input->post('country', TRUE),
				'industry'       	  => $this->input->post('industry_name', TRUE),
				'registrant_name'     => $this->input->post('registrant_name', TRUE),
				'registrant_email'    => $this->input->post('registrant_email', TRUE),
				'registrant_password' => $this->input->post('registrant_password', TRUE)
			);
			
			// generate registration id
			$reg_code = md5(microtime());
			$post_data['reg_code'] = $reg_code;
			
			$reg = $this->company_model->register($post_data);
			if($reg)
			{
				// send email
				// Jl. RS Fatmawati, Jakarta Selatan
				// Furniture manufacturer and exporter
				$this->load->model('mailer_model');
				$this->mailer_model->email_company_registered(array(
					'email'    => $post_data['registrant_email'],
					'name' 	   => $post_data['registrant_name'],
					'company'  => $post_data['name'],
					'reg_code' => $reg_code
				));
				
				// save session
				$this->session->set_userdata(array(
					'company_name'      => $post_data['name'],
					'company_reg_name'  => $post_data['registrant_name'],
					'company_reg_email' => $post_data['registrant_email']
				));
				redirect(base_url('company/register/done'));
			}
			else
			{
				redirect(base_url('company/register/failure'));
			}
		}
		else
		{
			$this->_data['content'] = $this->load->view('company/register_form', '', TRUE);
			$this->load->view('default', $this->_data);
		}
	}
	
}