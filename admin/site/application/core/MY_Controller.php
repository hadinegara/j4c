<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    var $_data;
    
    function __construct()
    {
        parent::__construct();
        
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors',  1);
        
        $this->_data = array(
            'page_title' => 'Welcome to AAA',
            'content' => 'Content of AAA'
        );
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
        
        $this->_data['addjs'] = $add;
    }
    
}