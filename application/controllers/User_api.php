<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';

class User_Api extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods' => ['POST'],
            //  'requireAuthorization' => true,
        ]);


        $payload = $this->userlogin_model->listing();

        // Load Authorization Library or Load in autoload config file
        $this->load->library('authorization_token');

        // generte a token
        $token = $this->authorization_token->generateToken($payload);

        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'token' => $token,
                ],

            ],
            200
        );
    }



    public function view_user()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);

        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'user_data' => $user_data['token_data']
                ],
            ],
            200
        );
    }
    /**
     * view method
     *
     * @link [api/user/view]
     * @method POST
     * @return Response|void
     */
    public function view()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);

        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'user_data' => $user_data['token_data']
                ],
            ],
            200
        );
    }
}
