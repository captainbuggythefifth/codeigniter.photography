<?php class Autologin {
    protected $CI;
    function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('AuthLibrary');
    }
    function cookie_check() {
        if($this->CI->authlibrary->checkLoggedIn()){
            if(current_url() == "manage"){
                redirect(base_url());
            }
        }
    }
}