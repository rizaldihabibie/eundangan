<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('user');
    }

    

    
    public function index(){
        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        $clientId = '839609477079-ur1738aqqlq7cceapha9gqufoce53lk0.apps.googleusercontent.com';
        $clientSecret = 'X1lLvrFCe5wLHVEZHMd7D8vR';
        $redirectUrl = base_url('undangan/user_authentication');
        $apiKey = 'AIzaSyCPa9KI7qEoKuIo0VtB2xQu8e0FGXf6gRo';
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('eundangan');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $gClient->setDeveloperKey($apiKey);
        // $gClient->addScope("https://www.googleapis.com/auth/userinfo.email");
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_GET['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {

            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            // print_r($userProfile);
            // exit();
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
            $userData['locale'] = $userProfile['locale'];
            $userData['picture_url'] = $userProfile['picture'];
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $authUrl = $gClient->createAuthUrl();
            $data['authUrl'] = $authUrl;
            redirect($authUrl);
        }
        $this->load->view('undangan/google_login',$data);
    }
    
    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('undangan/user_authentication');
    }
}