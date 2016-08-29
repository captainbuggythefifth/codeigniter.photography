<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerController extends CI_Controller {

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
        $this->load->library('FacebookLibrary', null, 'FacebookLibrary');
    }

    public function index(){

        $sLoginUrl = $this->FacebookLibrary->getRedirectLoginHelper();

        $aData['sLoginUrl'] = $sLoginUrl;

        $this->load->view('app/layouts/header');
        $this->load->view('app/manage/index', $aData);
        $this->load->view('app/layouts/footer');
    }
}