<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Oauth extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        
        header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
        header('Pragma: no-cache'); // HTTP 1.0.
        header('Expires: 0'); // Proxies.
                        
        $this->load->model(array(
        	'register_model',
        	'seeker_model',
        ));
        
        // save OAuth Mode
       	$opt = $this->input->get('opt', TRUE);
       	if(strtolower($opt) == 'login')
       		$this->session->set_userdata('OAUTH_MODE', 'LOGIN');
    }
    
    private function _logged_redirect()
    {
   		$back_url = $this->session->userdata('login_back_url');
   		$next_url = ($back_url != '') ? $back_url : base_url('my_job/front');
   		$this->session->unset_userdata('login_back_url');
   		redirect($next_url);
    }

    function index()
    {
        show_404();
    }
    
    function done()
    {
    	$reg_code = $this->session->userdata('reg_code');
    	$platform = $this->session->userdata('platform');
    	
    	if($reg_code != '')
    	{
    		// get session data
    		$data = array(
    				'name'  => $this->session->userdata('reg_name'),
    				'email' => $this->session->userdata('reg_email'),
    				'code'  => $this->session->userdata('reg_code')
    		);
    			
    		// clear session
    		$this->session->sess_destroy();
    			
    		// define content
    		$this->_data['content'] = $this->load->view('register/manual/done', $data, TRUE);
    		$this->load->view('default', $this->_data);
    	}
    	else
    	{
    		$this->session->sess_destroy();
    		redirect(base_url());
    	}
    }
    
    function failure()
    {
    	// message
    	$error_message = $this->session->userdata('oauth_failure_msg');
    	$platform = $this->session->userdata('platform');

    	// clear session
	    $this->session->sess_destroy();
	    $this->out($platform, TRUE);

        if($error_message != '')
	    {
	    	// display error
			$this->_data['content'] = $this->load->view('register/manual/failure', array('error_message'=> $error_message), TRUE);
			$this->load->view('default', $this->_data);
	    }
	    else
	    {
	    	redirect(base_url());
	    }
	}

    function facebook()
    {
        $this->config->load('facebook');
        $fb_config = $this->config->item('facebook');
        $this->load->library('facebook', $fb_config);

        // get user
        $user = $this->facebook->getUser();

        if($user)
        {
            try
            {
                $data['user_profile'] = $this->facebook->api('/me');
            }
            catch(FacebookApiException $e)
            {
                $user = null;
            }
        }

        // set url
        if($user)
        {
            $data['logout_url'] = $this->facebook->getLogoutUrl(array(
                'next' => base_url('oauth/out/facebook')
            ));
            
            // save data
            $save = $this->register_model->save_oauth(@$data['user_profile'], 'facebook');
            $oauth_msg = $this->session->userdata('oauth_msg');
            if($oauth_msg == 'OAUTH_LOGIN_SUCCESS')
            {
            	$this->session->unset_userdata(array(
            		'OAUTH_MODE'  => '',
            		'oauth_msg'   => '',
            		'platform'    => '',
            		'private_key' => ''
            	));
            	$this->_logged_redirect();
            }
            else
            {
            	$next = $save ? 'done' : 'failure';
            	redirect(base_url("oauth/{$next}"), 'refresh');            
            }
        }
        else
        {
            redirect($this->facebook->getLoginUrl());
        }
    }
    
    function googleplus()
    {
    	$this->load->library('googleplus');
    	
    	// add email address scope
    	$this->googleplus->client->setScopes(array(
    		"https://www.googleapis.com/auth/plus.me",
    		"https://www.googleapis.com/auth/userinfo.email"
    	));
    	
		if(isset($_GET['code']))
		{
			$this->googleplus->client->authenticate();
			$this->session->set_userdata('GP_token', $this->googleplus->client->getAccessToken());
			redirect(base_url("oauth/googleplus"));
		}
		
		$GP_token = $this->session->userdata('GP_token');
		if($GP_token != '') 
		{
			$this->googleplus->client->setAccessToken($GP_token);
		}
		
		$GP_access_token = $this->googleplus->client->getAccessToken();
		if($GP_access_token) 
		{
			$this->session->unset_userdata('GP_token', '');
			$this->session->set_userdata('GP_token', $GP_access_token);
			$data = $this->googleplus->people->get('me');
				
            // save data
            $save = $this->register_model->save_oauth($data, 'googleplus');
		    $oauth_msg = $this->session->userdata('oauth_msg');
            if($oauth_msg == 'OAUTH_LOGIN_SUCCESS')
            {
            	$this->session->unset_userdata(array(
            		'OAUTH_MODE'  => '',
            		'oauth_msg'   => '',
            		'platform'    => '',
            		'private_key' => ''
            	));
            	$this->_logged_redirect();
            }
            else
            {
            	$next = $save ? 'done' : 'failure';
            	redirect(base_url("oauth/{$next}"), 'refresh');            
            }
        } 
		else 
		{
			$auth_url = $this->googleplus->client->createAuthUrl();
			redirect($auth_url);
		}
    }

    function linkedin()
    {
        // load config
        $this->config->load('linkedin');
        $in_config = $this->config->item('linkedin');
        $this->load->library('linkedin', $in_config);
        
        $url  = 'http://api.linkedin.com/v1/people/~:(id,first-name,last-name,email-address,picture-url,headline,location:(name,country:(code)))';
        $data = $this->linkedin->call($url);
        
        $save = $this->register_model->save_oauth($data, 'linkedin');
        $oauth_msg = $this->session->userdata('oauth_msg');
        if($oauth_msg == 'OAUTH_LOGIN_SUCCESS')
        {
        	$this->session->unset_userdata(array(
        			'OAUTH_MODE'  => '',
        			'oauth_msg'   => '',
        			'platform'    => '',
        			'private_key' => ''
        	));
        	$this->_logged_redirect();
        }
        else
        {
        	$next = $save ? 'done' : 'failure';
        	redirect(base_url("oauth/{$next}"), 'refresh');
        }        
    }
    
    function twitter($action='')
    {
    	// not implemented
    	exit;
        $this->load->library('tweet');
        
        $action = trim(strtolower($action));
        switch($action)
        {
            default:
                $callback_url = base_url('oauth/twitter/set-data');
                if (! $this->tweet->logged_in())
                {
                    $this->tweet->set_callback($callback_url);
                    $this->tweet->login();
                }
                else
                {
                    redirect($callback_url);
                }
            break;
            
            case 'set-data':
                echo '<pre>';
                $user = $this->tweet->call('get', 'account/settings');
                print_r($user);
            break;
        }
    }
        
    function out($p='', $stay=FALSE, $next='')
    {
        $p = trim(strtolower($p));
        switch($p)
        {
            case 'facebook':
                $this->config->load('facebook');
                $fb_config = $this->config->item('facebook');
                $this->load->library('facebook', $fb_config);
                $this->facebook->destroySession();
            break;
            
            case 'googleplus':
            	$this->load->library('googleplus');
            	if($this->googleplus->client->getAccessToken())
            		$this->googleplus->client->revokeToken();
            break;
        
            case 'linkedin':
                $this->config->load('linkedin');
                $this->load->library('linkedin', $this->config->item('linkedin'));
                $this->linkedin->logout();
            break;
        
            case 'twitter':
                $this->load->library('tweet');
                $this->tweet->logout();
            break;
        }
        
        $this->session->sess_destroy();
        
        if(! $stay)
        	redirect(($next != '') ? $next : base_url(), 'refresh');
    }
}