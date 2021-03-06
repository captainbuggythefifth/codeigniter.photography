<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct(){
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->library('encryption');
        $this->load->library('AuthLibrary', null, 'AuthLibrary');
    }

    public function getLogin(){
        $this->load->view('app/layouts/header');
        $this->load->view('app/auth/login/index');
        $this->load->view('app/layouts/footer');
    }
    
    public function postLogin(){
        $aUser = $this->input->post();

        /*$encrypted = $this->encryption->encrypt($aUser['password']);*/

        $aResult = $this->UsersModel->getUserByEmailAndPassword($aUser);

        if($aResult['status']){
            $aUser = $this->UsersModel->getUserByEmailAndPassword($aUser);
            $this->session->set_userdata('aUser', $aUser);
            redirect(base_url() . 'manage');
        }
        else{
            $this->session->set_flashdata('aResult', $aResult);
            $this->load->view('app/layouts/header');
            $this->load->view('app/auth/login/index');
            $this->load->view('app/layouts/footer');
        }
        
    }
    
    public function getRegister(){
        $this->load->view('app/layouts/header');
        $this->load->view('app/auth/register/index');
        $this->load->view('app/layouts/footer');
    }

    public function postRegister(){
        $aUser = $this->input->post();

        $aResult = $this->UsersModel->create($aUser);

        if($aResult['status'] == false){
            $this->session->set_flashdata('aResult', $aResult);
            $this->load->view('app/layouts/header');
            $this->load->view('app/auth/register/index');
            $this->load->view('app/layouts/footer');
        }
        else{
            $aUser = $this->UsersModel->getUserByEmailAndPassword($aUser);
            $this->session->set_userdata('aUser', $aUser);
            redirect(base_url() . 'manage');
        }
    }


    public function logout(){
        $this->session->unset_userdata('aUser');
        redirect(base_url('login'));
    }

}