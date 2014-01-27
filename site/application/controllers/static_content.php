<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Static_content extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        echo 'stc/index';
    }
    
    function content($page='')
    {
        $page_file = APPPATH . 'views/static/' . $page .'_'. LANG_PREFIX . EXT;
        if($page != '' && file_exists($page_file))
        {
    		$this->_data['content'] = $this->load->view('static/'. $page .'_'. LANG_PREFIX, '', TRUE);
    		$this->load->view('default', $this->_data);            
        }
        else
        {
            show_404();
        }
    }
    
}