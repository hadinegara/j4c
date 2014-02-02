<?php 

class Account extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
        
		// set active menu
		Menu::$active_menu = 'login';
		Menu::$active_submenu = 'account';
    }
    
    /**
     * Change password
     */
    function index()
    {
		$this->_data['content'] = $this->load->view('account/front', '', TRUE);
		$this->load->view('default', $this->_data);
    }
    
    function _password_match()
    {
        $new_password = $this->input->post('new_password', TRUE);
        $re_password = $this->input->post('re_password', TRUE);
        if($re_password == $new_password)
        {
            $email = $this->session->userdata('email');
            $old_password = $this->input->post('old_password', TRUE);
            $test = $this->login_model->test_login($email, $old_password);
            
            if($test['status'] !== TRUE)
            {
                $this->form_validation->set_message('_password_match', lang('msg_invalid_old_password'));
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
        else
        {
            $this->form_validation->set_message('_password_match', lang('msg_re_password_not_match'));
            return FALSE;
        }
    }
    
    /**
     * save password
     */
    function save_password()
    {
        $this->form_validation->set_rules('old_password', lang('label_password_old'), 'required|trim');
        $this->form_validation->set_rules('new_password', lang('label_password_new'), 'required|trim');
        $this->form_validation->set_rules('re_password',  lang('label_password_re'),  'callback__password_match|trim');
        
        if($this->form_validation->run() !== FALSE)
        {
            $new_password = $this->input->post('new_password');
            $update = $this->login_model->update_password($new_password);
            
            $message = ($update) ? lang('label_update_password_done') : lang('label_update_password_failure');
            $target = ($update) ? base_url("account?change=done") : base_url("account?change=failure");
            
            $this->session->set_flashdata('password_change', $message);
            redirect($target);
        }
        else
        {
            $this->index();
        }
    }
    
}