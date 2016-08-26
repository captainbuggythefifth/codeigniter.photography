<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once (APPPATH . "vendor/facebook/php-sdk-v4/src/Facebook/autoload.php");

class FacebookLibrary{

    protected $CI;
    public $oFacebook;
    public $sPageID = "294062294283138";

    function __construct(){
        $this->CI =& get_instance();
        $this->oFacebook = new Facebook\Facebook([
            'app_id' => '1760728680865683',
            'app_secret'    => "db6f36a2906769e3ae954516ef35d45d",
            'default_graph_version' => 'v2.7'
        ]);

        $this->oFacebook->setDefaultAccessToken("EAAZABX5eRn5MBAFqpohZBzyKVGAQy6nHGE9Lds0UiAaWLGyB5e1kVs1hEXoQGKO5bwW3Q3ncEU3gtRrnGdgzDl0TLy3VERX2IeRcdRIdaz1CEHCuSKEah07S7IMgmA2SPCPpN6z9Eqz83VZByNp");
    }

    public function checkLoggedIn(){
        $aUser = $this->CI->session->userdata('aUser');
        if(is_array($aUser) && !empty($aUser)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getAlbums(){
        try{
            $response = $this->oFacebook->get($this->sPageID . '/albums');
            $graphEdge = $response->getGraphEdge();
            return $this->JSONArraytoArray($graphEdge);
        }
        catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public function getPhotosOnAlbum($iAlbumID){
        try{
            $response = $this->oFacebook->get($iAlbumID . '/photos');
            $graphEdge = $response->getGraphEdge();
            return $this->JSONArraytoArray($graphEdge);
        }
        catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public function JSONArraytoArray($oJSONArray){
        $aContainer = array();
        foreach ($oJSONArray as $JSONArray){
            $aContainer[] = ((array)json_decode($JSONArray));
        }

        return $aContainer;
    }
}