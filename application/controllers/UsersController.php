<?php
/**
 * Created by PhpStorm.
 * User: Web Designer
 * Date: 8/10/2016
 * Time: 4:28 PM
 */

    class UsersController extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->library('AuthLibrary');
            $this->load->model('UsersModel');
        }

        public function index(){
            $aUsers = $this->UsersModel->getUsers();
            $aData['aUsers'] = $aUsers;
            $this->load->view('app/layouts/header');
            $this->load->view('app/manage/users/index', $aData);
            $this->load->view('app/layouts/footer');
        }
    }