<?php
/**
 * Created by PhpStorm.
 * User: Web Designer
 * Date: 8/10/2016
 * Time: 4:28 PM
 */

class AlbumsController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('AuthLibrary', null, 'AuthLibrary');
        $this->load->model('UsersModel');
        $this->load->library('FacebookLibrary', null, 'FacebookLibrary');
        $this->load->model('FacebookCredentialsModel');
    }

    public function index(){

        $aFacebookCredential = $this->FacebookCredentialsModel->getActiveRecord();

        $this->FacebookLibrary->setDefaultAccessToken($aFacebookCredential['sFBExchangeToken']);

        $aAlbums = $this->FacebookLibrary->getAlbums();
        $aPhotos = array();
        /*$i = 0;
        foreach ($aAlbums as $album){

            $aPhotos[] = $this->FacebookLibrary->getPhotosOnAlbum($album['id']);
        }*/

        for($i = 0; $i < count($aAlbums); $i++){
            $aAlbums[$i]['aPhotos'] = $this->FacebookLibrary->getPhotosOnAlbum($aAlbums[$i]['id']);
            /*for($j = 0; $j < count($aAlbums[$i]['aPhotos']); $j++){
                $aAlbums[$i]['aPhotos'][$j]['picture'] = $this->FacebookLibrary->getPictureLinkByID($aAlbums[$i]['aPhotos'][$j]['id']);
            }*/
        }

        //var_dump($aAlbums);die();

        $aData['aAlbums'] = $aAlbums;
        $aData['aFacebookCredentials'] = $aFacebookCredential;
        $this->load->view('app/layouts/header');
        $this->load->view('app/manage/albums/index', $aData);
        $this->load->view('app/layouts/footer');
    }
}