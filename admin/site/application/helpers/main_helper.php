<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

function assets_url($uri='')
{
    return ($uri == '') ? base_url('assets').'/' : base_url("assets/{$uri}");
}