<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TeamsModel extends CI_Model{
    private $table;

    public $iStatusActive = 1;
    public $iStatusRemoved = 2;

    function __construct(){
        parent::__construct();
        $this->table = "teams";
        $this->load->library('encryption');
    }

    /*function create($aUser){

        $aResult = array(
            'status' => false,
            'data'  => array()
        );

        if($this->checkUserEmail($aUser['email'])){
            $aResult['data'] = array(
                'reason' => "Email already exists"
            );
            return $aResult;
        }

        $aUser['password'] =  $this->encryption->encrypt($aUser['password']);
        $this->db->insert($this->table, $aUser);

        $result = $this->db->insert_id();
        return $result;

    }*/

    function checkUserEmail($sEmail){
        $this->db->where('email', $sEmail);
        $result = $this->db->get($this->table);
        return $result;
    }

    function getUserByEmailAndPassword($aUser){
        $aResult = array(
            'status' => false,
            'data'  => array()
        );
        $this->db->where('email', $aUser['email']);
        /*$this->db->where('password', $this->encryption->encrypt($aUser['password']));*/
        $result = $this->db->get($this->table);

        if($result->num_rows() > 0){

            $aUserResult = $result->row_array();
            $sPasswordDecrypted = $this->encryption->decrypt($aUserResult['password']);
            if($sPasswordDecrypted == $aUser['password']){
                $aResult['status'] = true;
                $aResult['data'] = $this->getCleaned($result->row_array());
                return $aResult;
            }
            else{
                $aResult['data'] = array(
                    'reason' => "Password did not match. Please try again"
                );
                return $aResult;
            }

        }
        else{

            $aResult['data'] = array(
                'reason' => "Email does not exist or wrong password. Please try again"
            );
            return $aResult;
        }

    }
    function getUserByID($iUserID){
        $aResult = array(
            'status' => false,
            'data'  => array()
        );

        $this->db->where('id', $iUserID);
        /*$this->db->where('password', $this->encryption->encrypt($aUser['password']));*/
        $result = $this->db->get($this->table);
        if($result->num_rows() > 0){
            $aResult['data'] = $this->getCleaned($result->row_array());
            $aResult['status'] = true;
        }
        else{
            $aResult['data'] = array(
                'reason' => "User does not exist"
            );
            $aResult['status'] = false;
        }
        return $aResult;
    }

    function getCleaned($aUser){
        $aRemove = array(
            'password',
        );

        foreach ($aRemove as $removeElement => $removeKey){
            if(array_key_exists($removeKey, $aUser)){
                unset($aUser[$removeKey]);
            }
        }
        return $aUser;
    }

    function getUsers(){
        $result = $this->db->get($this->table);
        $aUsers = $result->result_array();
        for($i = 0; $i < count($aUsers); $i++){
            $aUsers[$i] = $this->getCleaned($aUsers[$i]);
        }
        return $aUsers;
    }

    function update($aUser){
        $aResult = array(
            'status' => false,
            'data'  => array()
        );
        $this->db->where('id', $aUser['id']);

        if($aUser['password'] != ""){
            $aUser['password'] =  $this->encryption->encrypt($aUser['password']);
        }
        else{
            unset($aUser['password']);
        }

        $result = $this->db->update($this->table, $aUser);
        if($result){
            $aResult['status'] = true;
            $aResult['data']['message'] = "Successfully saved the record";
        }
        else{
            $aResult['data']['reason'] = "Something went wrong. Please try again";
        }
        return $aResult;
    }

    function getTeams(){
        $this->db->where('status', $this->iStatusActive);
        $result = $this->db->get($this->table);
        $aTeams = $result->result_array();
        for($i = 0; $i < count($aTeams); $i++){
            $oResult = $this->db->query("SELECT * FROM users WHERE id = " . $aTeams[$i]['user_id']);
            $aTeams[$i]['aUser'] = $oResult->row_array();
        }
        return $aTeams;
    }

    function create($iUserID){
        $aResult = array(
            'status' => false,
            'data'  => array()
        );
        $aUser = array(
            'user_id' => $iUserID
        );
        $this->db->insert($this->table, $aUser);
        $oResult = $this->db->insert_id();
        if($oResult){
            $aResult = array(
                'status' => true,
                'data'  => array(
                    'message' => "Successfully added a new user to the Team!",
                    'iTeamID' => $oResult
                )
            );
        }else{
            $aResult['data']  = array(
                'message'    => "Something went wrong. Please try again"
            );
        }
        return $aResult;
    }

}