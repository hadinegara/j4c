<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mce extends CI_Controller {
    
    var $_path = '';
    
    function __construct()
    {
        parent::__construct();
        $this->_path = rtrim(preg_replace('#system/#i', '', BASEPATH),'/') . '/assets/images/blog';
    }
    
    function index()
    {}
    
    function popup($path='')
    {
        if($path == '') show_404();
        
        $method = 'popup_'. preg_replace('/[^a-z0-9\_]/i', '_', strtolower($path));
        if(method_exists($this, $method))
        {
            $this->$method();
        }
        else
        {
            show_404();
        }
    }
    
    function popup_image()
    {
        $this->load->view('mce/popup-image', array(
            'gallery_path' => $this->_path
        ));
    }
    
    function popup_image_upload()
    {
        if(isset($_FILES['file']))
        {
            $dir    = $this->_path;
            $ferror = isset($_FILES['file']['error']) ? $_FILES['file']['error'] : '-X';
            $fname  = $_FILES['file']['name'];
            $target = "{$dir}/{$fname}";
            if($ferror == 0)
            {
                if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
                {
                    header("SUCCESS", TRUE, 200);
                    header('Content-Type: application/json');
                    echo json_encode(array(
                        'success' => TRUE,
                        'message' => assets_url("images/blog/{$fname}")
                    ));
                }
                else
                {
                    $msg = 'Upload Failed';
                    header($msg, TRUE, 500);
                    header('Content-Type: application/json');
                    echo json_encode(array(
                        'success' => FALSE,
                        'message' => $msg
                    ));
                }
            }
            else
            {
                $errmsg = array(
                    '-X' => 'Unknown Error'
                );

                $msg = isset($errmsg[$ferror]) ? $errmsg[$ferror] : 'Internal Server Error';
                header($msg, TRUE, 500);
                header('Content-Type: application/json');
                echo json_encode(array(
                    'success' => FALSE,
                    'message' => $msg
                ));
            }
        }
        else
        {
            $msg = 'No uploaded file';
            header($msg, TRUE, 500);
            header('Content-Type: application/json');
            echo json_encode(array(
                'success' => FALSE,
                'message' => $msg
            ));
        }
    }    
    
}