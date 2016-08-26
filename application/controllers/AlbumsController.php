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
    }

    public function index(){
        $aAlbums = $this->FacebookLibrary->getAlbums();
        $aPhotos = array();
        /*$i = 0;
        foreach ($aAlbums as $album){

            $aPhotos[] = $this->FacebookLibrary->getPhotosOnAlbum($album['id']);
        }*/

        for($i = 0; $i < count($aAlbums); $i++){
            $aAlbums[$i]['aPhotos'] = $this->FacebookLibrary->getPhotosOnAlbum($aAlbums[$i]['id']);
            for()
        }

        var_dump($aAlbums);
        var_dump($aPhotos);die();
        $aData = array(
            'aAlbums' => $aAlbums
        );

    }
}