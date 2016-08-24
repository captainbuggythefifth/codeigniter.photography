<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$hook['pre_controller_constructor'][] = array(
    'class'    => 'Autologin',
    'function' => 'cookie_check',
    'filename' => 'autologin.php',
    'filepath' => 'hooks'
);