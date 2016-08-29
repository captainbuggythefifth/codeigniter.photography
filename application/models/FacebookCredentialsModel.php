<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FacebookCredentialsModel extends CI_Model{
    private $table;

    function __construct(){
        parent::__construct();
        $this->table = "facebook_credentials";
        $this->load->library('encryption');
    }

    function update($aFacebookCredential){
        $this->db->where('id', 1);
        $result = $this->db->update($this->table, $aFacebookCredential);
    }

    function getActiveRecord(){
        $this->db->where('id', 1);
        $result = $this->db->get($this->table);
        return $result->row_array();
    }

}