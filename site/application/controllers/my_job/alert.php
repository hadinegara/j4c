<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alert extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
        $this->load->library(array(
            'form_validation'
        ));
        
		$this->load->model(array(
			'seeker_model',
            'job_model'
		));
		
		// set active menu
		Menu::$active_menu = 'my_job';
		Menu::$active_submenu = 'alert';
	}
	
	function index()
	{
		$seeker_id = $this->session->userdata('seeker_id');
	
		$vars = array(
            'active_tab' => 'alert',
            'alerts' => $this->job_model->get_alerts($seeker_id)
        );
	
		// define content
		$this->_data['content'] = $this->load->view('my_job/alert', $vars, TRUE);
		$this->load->view('default', $this->_data);	
	}
    
    function create()
    {
		$seeker_id = $this->session->userdata('seeker_id');
	
		$vars = array(
            'active_tab' => 'alert',
            'categories' => $this->job_model->categories(),
            'locations' => $this->job_model->locations()
        );
        
		// define content
		$this->_data['content'] = $this->load->view('my_job/alert-create', $vars, TRUE);
		$this->load->view('default', $this->_data);	        
    }
    
    function delete()
    {
        $id = $this->input->get('id');
        if($id != '')
        {
            $id = base64_decode($id);
            $delete = $this->job_model->delete_alert($id);
            $message = $delete ? lang('label_alert_deleted') : lang('label_alert_delete_failure');
            redirect(base_url("my_job/alert"));
        }
        else
        {
            show_404();
        }
    }
    
    function save()
    {
        $this->form_validation->set_rules('title', lang('label_title'), 'required|trim');
        $this->form_validation->set_rules('location', lang('label_location'), 'trim');
        $this->form_validation->set_rules('specialization', lang('label_specialization'), 'trim');
        $this->form_validation->set_rules('salary', lang('label_salary'), 'trim');
        $this->form_validation->set_rules('job_type', lang('label_job_type'), 'trim');
        
        if($this->form_validation->run() !== FALSE)
        {
            if(@$_POST['title'] != '')
            {
                $post_data['title'] = $this->input->post('title', TRUE); 
            }
            
            if(@$_POST['location'] != '')
            {
                $post_data['location'] = $this->input->post('location', TRUE); 
            }
            
            if(@$_POST['specialization'] != '')
            {
                $post_data['specialization'] = $this->input->post('specialization', TRUE); 
            }
            
            if(@$_POST['salary'] != '')
            {
                $post_data['salary'] = $this->input->post('salary', TRUE); 
            }
            
            if(@$_POST['job_type'] != '')
            {
                $post_data['job_type'] = $this->input->post('job_type', TRUE); 
            }
            
            $seeker_id = $this->session->userdata('seeker_id');
            $period = $this->input->post('period', TRUE);
            $save = $this->job_model->create_alert($seeker_id, $period, $post_data);
            
            $flashdata = ($save) ? 'label_alert_saved' : 'label_alert_failure';
            $this->session->set_flashdata('flashdata', lang($flashdata));
            redirect(base_url("my_job/alert"), 'refresh');            
        }
        else
        {
            $this->create();
        }
    }

}
