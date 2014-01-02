<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu {
    
    static $active_menu = '';
    static $active_submenu = '';
    
    function main()
    {
        $this->load->view('menu/main', array(
            'active_menu' => self::$active_menu,
			'active_submenu' => self::$active_submenu
        ));
    }
    
    function left($name='')
    {
        if($name == '')
        {
            $name = self::$active_menu != '' ? self::$active_menu : 'home';
        }
        
        $this->load->view('menu/left_'. strtolower($name), array(
            'active_submenu' => self::$active_submenu
        ));
    }
    
}