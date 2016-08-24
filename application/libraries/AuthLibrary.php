<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Web Designer
 * Date: 8/10/2016
 * Time: 3:21 PM
 */
class AuthLibrary{

    protected $CI;

    function __construct(){
        $this->CI =& get_instance();
    }

    public function checkLoggedIn(){
        $aUser = $this->CI->session->userdata('aUser');
        if(is_array($aUser) && !empty($aUser)){
            return true;
        }
        else{
            return false;
        }
    }
}