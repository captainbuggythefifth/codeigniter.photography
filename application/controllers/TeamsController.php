<?php


class TeamsController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('AuthLibrary', null, 'AuthLibrary');
        $this->load->model('UsersModel');
        $this->load->model('TeamsModel');
    }

    public function index()
    {
        $aTeams = $this->TeamsModel->getTeams();

        $aData['aTeams'] = $aTeams;
        $this->load->view('app/layouts/header');
        $this->load->view('app/manage/teams/index', $aData);
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

    public function postCreate(){
        $iUserID = $this->input->post('iUserID');
        $aUser = $this->UsersModel->getUserByID($iUserID);
        $aResult = $this->TeamsModel->create($iUserID);
        $aData['data']['aTeam']['id'] = $aResult['data']['iTeamID'];
        $aData['data']['aTeam']['aUser'] = $aUser['data'];
        if($aResult['status'] == true){
            $aResult['view'] = $this->load->view('app/manage/teams/segments/table/tr/index', $aData['data'], true);
        }
        echo json_encode($aResult);
    }
    
}