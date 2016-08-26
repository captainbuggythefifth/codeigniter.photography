<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacebookController extends CI_Controller {

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
        $this->load->library('AuthLibrary');
    }

    public function index(){
        $this->load->view('app/layouts/header');
        $this->load->view('app/manage/index');
        $this->load->view('app/layouts/footer');
    }

    public function getFacebook(){

        $accessToken = $_POST['accessToken'];
        $pageId = $_GET['pageId'];
        $fbAppId = 'xxx';
        $fbAppSecret = 'xxx';

        $appsecretProof = hash_hmac('sha256', $accessToken, $fbAppSecret);
        //init curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'facebook-php-3.2');

        //get extended user access token
        $url = 'https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token' .
            '&client_id=' . $fbAppId . '&client_secret=' . $fbAppSecret . '&fb_exchange_token=' . $accessToken . '&appsecret_proof=' . $appsecretProof;
        curl_setopt($ch, CURLOPT_URL, $url);
        $curlResult = curl_exec($ch);
        $response_params = array();
        parse_str($curlResult, $response_params);
        $extendedUserToken = $response_params['access_token'];

        $appsecretProof = hash_hmac('sha256', $extendedUserToken, $fbAppSecret);
        //get extended page access token
        $url = 'https://graph.facebook.com/' . $pageId .
            '?fields=access_token' .
            '&access_token=' . $extendedUserToken .
            '&appsecret_proof=' . $appsecretProof;
        curl_setopt($ch, CURLOPT_URL, $url);
        $curlResult = curl_exec($ch);
        curl_close($ch);
        $pageToken = json_decode($curlResult)->access_token;

        echo $pageToken;
    }
}