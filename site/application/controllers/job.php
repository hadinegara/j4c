<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'job_model',
			'seeker_model'
		));
		
		$this->_addjs(array(
			'app-job.js'
		));
	}
	
	function apply()
	{
		$job_id = dec($this->input->get('id', TRUE));
		$seeker_id = $this->session->userdata('seeker_id');
		if($seeker_id != '')
		{
			$pstatus = $this->seeker_model->get_percentage_status($seeker_id);
			if($pstatus < 100)
			{
				$this->session->set_flashdata('notification', $this->lang->line('msg_resume_not_complete'));
				redirect(base_url('my_job/resume'));
			}
			else
			{
				$this->job_model->apply($job_id, $seeker_id);
				redirect(base_url('my_job'));
			}
		}
		else
		{
			$this->session->set_userdata(array(
				'login_back_url' => full_url(),
				'login_message' => $this->lang->line('msg_job_apply_need_login')
			));
			redirect(base_url('login/manual'));
		}
	}
	
	function detail($job_id='')
	{
		if($job_id == '')
			show_404();
			
		$detail = $this->job_model->job_detail($job_id);
		if($detail == FALSE)
			show_404();
		
		$this->_data['content'] = $this->load->view('job/detail', array('detail'=>$detail), TRUE);
		$this->load->view('default', $this->_data);
	}
	
	function index()
	{
	}
	
}