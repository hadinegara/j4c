<?php

class Linkedin {
    
    private $obj = '';
    private $in_config = array();
    private $error = '';
    private $success = FALSE;
    
    function __construct($config)
    {
        $defaults = array(
            'debug' => 1,
            'debug_http' => 1,
            'server' => 'LinkedIn',
            'redirect_uri' => '',
            'client_id' => 'uf3eyabqxeek',
            'client_secret' => 'd3JsKIallO7hc7Ux',
            'scope' => 'r_basicprofile r_emailaddress'
        );        
        $options = array_merge($defaults, $config);
        $this->in_config = $options;
        $this->init();
    }
    
    function __call($name, $args)
    {
        static $o;
        isset($o) OR $o =& $this->obj;
        return $o->$name($args);
    }
    
    private function init()
    {
        if(strlen($this->in_config['client_id']) == 0 || strlen($this->in_config['client_secret']) == 0)
        {
            $this->error = 'Client ID and Client Secret not defined';
            return FALSE;
        }
        
        require('linkedin/http.php');
        require('linkedin/oauth_client.php');
        $this->obj = new oauth_client_class;
        
        foreach($this->in_config as $item=>$val)
        {
            $this->obj->$item = $val;
        }

        if(($success = $this->obj->Initialize()))
        {
            if(($success = $this->obj->Process()))
            {
                $this->success = TRUE;
            }
        }
    }
    
    function call($url='', $method='GET', $params=FALSE)
    {
        $url = $url == '' ? 'http://api.linkedin.com/v1/people/~' : $url;
        
        $result = FALSE;
        
        if($this->success && $this->obj->access_token)
        {
            $params = !$params ? array('format'=>'json') : $params;
            $run = $this->obj->CallAPI(
                $url, 
                $method, 
                $params, 
                array('FailOnAccessError'=>true), 
                $result
            );            
            $this->success = $this->obj->Finalize($run);
        }
        
        if($this->obj->exit)
        {
            $this->error = 'Exit';
            $this->success = FALSE;
            return FALSE;
        }
        
        if($this->success)
        {
            return $result;
        }
        else
        {
            $this->error = $this->obj->error;
            return FALSE;
        }
    }
    
    function get_error()
    {
        return $this->error;
    }
    
    function logout()
    {
        $this->call('https://api.linkedin.com/uas/oauth/invalidateToken');
        $this->obj->ResetAccessToken();
        return TRUE;
    }
    
}