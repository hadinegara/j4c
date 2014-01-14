<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $_data;
	
	function __construct()
	{
		parent::__construct();
		
		//$this->output->enable_profiler();
		
		// skip
		$this->_skip();
		
		// define lang active
		define('LANG_ACTIVE', 'english');
		
		$this->lang->load('label', LANG_ACTIVE);
		
		// default data
		$this->_data = array(		
			'page_title' => 'Job4Career',
			'content' => ''		
		);
	}
	
	private function _skip()
	{
		$uri = strtolower($this->uri->segment(1));
		switch($uri)
		{
			case 'company':
				$company_login_id = $this->session->userdata('company_login_id');
				if($company_login_id != '')
				{
					if($this->uri->segment(2) == '')					
						redirect(base_url('company/front'), 'location', 301);
				}
				else
				{
					if(! preg_match('/(login|register)/i', $this->uri->segment(2)))
					{
						$this->session->sess_destroy();
						redirect(base_url('company/login'), 'location', 301);
					}
				}
			break;
			
			case 'login'	:	
				if($this->uri->segment(2) == '')
					redirect(base_url('login/manual'), 'location', 301);
			break;
			
			case 'my_job':
				$login_id = $this->session->userdata('login_id');
				if($login_id != '')
				{
					if($this->uri->segment(2) == '')					
						redirect(base_url('my_job/front'), 'location', 301);
				}
				else
				{
					$this->session->sess_destroy();
					redirect(base_url('login/manual'), 'location', 301);
				}
			break;
			
			case 'register'	:	
				if($this->uri->segment(2) == '')
					redirect(base_url('register/manual'), 'location', 301);
			break;
		}
	}
	
    function _addcss($file='')
    {
        $add = array();
        if(is_array($file))
        {
            foreach($file as $f)
            {
                if(preg_match('/https?/i', $f))
                    $add[] = $f;
                else
                    $add[] = assets_url("css/$f");
            }
        }
        else
        {
            $add[] = $file;
        }
        
        $this->_data['addcss'] = array_merge((array)@$this->_data['addcss'], $add);
    }
	
    function _addjs($file='')
    {
        $add = array();
        if(is_array($file))
        {
            foreach($file as $f)
            {
                if(preg_match('/https?/i', $f))
                    $add[] = $f;
                else
                    $add[] = assets_url("js/$f");
            }
        }
        else
        {
            $add[] = $file;
        }
        
        $this->_data['addjs'] = array_merge((array)@$this->_data['addjs'], $add);
    }
	
	function _check_date($date)
	{
		$date = ($date != '') ? explode('-', $date) : explode('-', date('d-m-Y'));
		
		if(! checkdate($date[1], $date[0], $date[2]))
		{
			$this->form_validation->set_message('_check_date', $this->lang->line('label_invalid_date'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function _form_id()
	{
		$form_id 	 = $this->input->post('form_id', TRUE);
		$public_key  = (int)$this->input->post('public_key', TRUE);
		$private_key = (int)$this->session->userdata('private_key');
		
		if(md5($public_key * $private_key) != $form_id)
		{
			if(! isset($this->form_validation))
				$this->load->library('form_validation');
				
			$this->form_validation->set_message('_form_id', $this->lang->line('label_form_id_invalid'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

}