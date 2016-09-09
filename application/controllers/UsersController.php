<?php


class UsersController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('AuthLibrary', null, 'AuthLibrary');
        $this->load->model('UsersModel');
    }

    public function index()
    {
        $aUsers = $this->UsersModel->getUsers();

        $aData['aUsers'] = $aUsers;
        $this->load->view('app/layouts/header');
        $this->load->view('app/manage/users/index', $aData);
        $this->load->view('app/layouts/footer');
    }

    public function getUpdate($iUserID)
    {
        $aUser = $this->UsersModel->getUserByID($iUserID);

        $aData['aUser'] = $aUser['data'];

        $this->load->view('app/layouts/header');
        $this->load->view('app/manage/users/update', $aData);
        $this->load->view('app/layouts/footer');
    }

    public function postUpdate($iUserID)
    {
        $aUser = $this->input->post();
        $aUser['id'] = $iUserID;
        $aResult = $this->UsersModel->update($aUser);
        if ($aResult['status'] == true) {
            redirect(base_url('users'));
        } else {
            $this->session->set_flashdata('aResult', $aResult);
            redirect(base_url('users/' . $aUser['id']));
        }
    }
    
    public function getUsersByName(){
        $sUserName = $this->input->get('sUserName');

        $aData = $this->UsersModel->getUsersByName($sUserName);
        if($aData['status'] == true)
            $aData['view'] = $this->load->view('app/manage/teams/segments/add-user/index', $aData['data'], true);

        echo json_encode($aData);
    }
}