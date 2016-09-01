<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once (APPPATH . "vendor/facebook/php-sdk-v4/src/Facebook/autoload.php");

use Facebook\FacebookRequest;

class FacebookLibrary{

    protected $CI;
    public $oFacebook;
    public $sPageID = "294062294283138";
    public $sPermissions = array(
        "manage_pages",
        "public_profile",
        "user_about_me",
        "user_photos",
        "publish_pages",
        "pages_manage_cta"
    );
    public $iAppID = "1760728680865683";
    public $sAppSecret = "db6f36a2906769e3ae954516ef35d45d";

    function __construct(){
        $this->CI =& get_instance();
        $this->oFacebook = new Facebook\Facebook([
            'app_id' => '1760728680865683',
            'app_secret'    => "db6f36a2906769e3ae954516ef35d45d",
            'default_graph_version' => 'v2.5'
        ]);
        
    }

    public function getRedirectLoginHelper(){
        $oHelper = $this->oFacebook->getRedirectLoginHelper();
        $sLoginUrl = $oHelper->getLoginUrl(/*'https://example.com/fb-callback.php'*/ base_url() . "/facebook/login-callback" , $this->sPermissions);

        return $sLoginUrl;
    }

    public function getAlbums(){
        try{
            $response = $this->oFacebook->get($this->sPageID . '/albums');
            $graphEdge = $response->getGraphEdge();
            return $this->JSONArrayToArray($graphEdge);
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
            return $this->JSONArrayToArray($graphEdge);
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

    public function getPictureLinkByID($iPhotoID){
        try{
            $response = $this->oFacebook->get($iPhotoID . '/picture?link');
            $graphEdge = $response->getGraphObject();
            return $this->JSONArrayToArray($graphEdge);
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
        /*$request = new FacebookRequest(
            $session = array([
                'fb_exchange_token' => "EAAZABX5eRn5MBANjWZCybXh3HXUkEUmLG0GdaNMT1l6ZBHhk2s0LxSqZCzUnmabY0sN1fzqwHK48GHrahobHeZCZBeTLfFUM9XXFrzD9xTJAGMvW8OkHFBXcf8Vn5aKUY7RwN2dZCNpmN34zpqDpCLpG0fpbNSKeiAZD"
            ]),
            'GET',
            '/' . $iPhotoID . '/picture'
        );

        $response = $request->execute();
        $graphObject = $response->getGraphObject();
        return $this->JSONArrayToArray($graphObject);*/
    }

    function getPhotoOnAlbum($iAlbumID){
        try{
            $response = $this->oFacebook->get($iAlbumID, '?link');
            $graphEdge = $response->getGraphNode();
            return $this->JSONArrayToArray($graphEdge);
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

    public function setDefaultAccessToken($sDefaultAccessToken){
        $this->oFacebook->setDefaultAccessToken($sDefaultAccessToken);
    }

    public function JSONArrayToArray($oJSONArray){
        $aContainer = array();
        foreach ($oJSONArray as $JSONArray){
            $aContainer[] = ((array)json_decode($JSONArray));
        }

        return $aContainer;
    }

}