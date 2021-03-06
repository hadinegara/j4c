<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'job_model',
            'company_model',
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
		
		// check is applied
		$is_applied = $this->job_model->is_applied($job_id, $seeker_id);
		if($is_applied)
		{
			$vars = array(
				'detail' => $this->job_model->job_detail($job_id),
				'is_applied' => $is_applied,
				'error_message' => $this->lang->line('msg_job_already_applied')
			);
			
			$this->_data['content'] = $this->load->view('job/detail', $vars, TRUE);
			$this->load->view('default', $this->_data);		
		}
		else
		{
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
	}
    
    function at($company='')
    {
        $company_id = substr($company, strrpos($company, '-')+1);
        
        $this->session->set_userdata(array(
            'related_name' => 'company',
            'related_value' => $company_id
        ));
        
        // get company deail
        $company_detail = $this->company_model->get_detail($company_id);
        if($company_detail !== FALSE)
        {
            $jobs = $this->job_model->get_by_company($company_id);
            
			$vars = array(
				'result' => $jobs,
                'company_detail' => $company_detail,
				'keyword' => ''
			);
			
			$this->_data['content'] = $this->load->view('search/result', $vars, TRUE);
			$this->load->view('default', $this->_data);
        }
        else
        {
            show_404();
        }
    }
	
	function detail($job_id='')
	{
		if($job_id == '')
			show_404();
			
		$detail = $this->job_model->job_detail($job_id);
		if($detail == FALSE)
			show_404();
		
        if($this->session->userdata('related_name') == 'spec' && $this->session->userdata('related_value') == '')
        {
            $spec_detail = $this->job_model->get_spec_detail($detail['category']);
            if(isset($spec_detail['childs'][0]['parent_id']))
            {
                $spec_detail2 = $this->job_model->get_spec_detail($spec_detail['childs'][0]['parent_id']);
                $this->session->set_userdata('related_value', $spec_detail2['list_id']);
            }
        }
        
		$vars = array(
			'detail' => $detail,
			'is_applied' => $this->job_model->is_applied($job_id, $this->session->userdata('seeker_id'))
		);
		
		$this->_data['content'] = $this->load->view('job/detail', $vars, TRUE);
		$this->load->view('default', $this->_data);
	}
	
	function index()
	{
	}
    
    function in($location='')
    {
        $this->session->set_userdata(array(
            'related_name' => 'location',
            'related_value' => $location
        ));
        
        $jobs = $this->job_model->get_by_location($location);
        
		$vars = array(
			'result' => $jobs,
            'location' => $location,
			'keyword' => ''
		);
		
		$this->_data['content'] = $this->load->view('search/result', $vars, TRUE);
		$this->load->view('default', $this->_data);
    }
    
    function spec($spec='')
    {
        $spec_id = substr($spec, strrpos($spec, '-')+1);
        
        $this->session->set_userdata(array(
            'related_name' => 'spec',
            'related_value' => $spec_id
        ));
        
        // get spec detail
        $spec_detail = $this->job_model->get_spec_detail($spec_id);
        
        if($spec_detail != FALSE)
        {
            $jobs = $this->job_model->get_by_specialization($spec_detail['list_id']);
            
    		$vars = array(
    			'result' => $jobs,
                'spec_detail' => $spec_detail,
    			'keyword' => ''
    		);
    		
    		$this->_data['content'] = $this->load->view('search/result', $vars, TRUE);
    		$this->load->view('default', $this->_data);
        }
        else
        {
            show_404();
        }
    }
	
}