<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';

class User_Api extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function simple_api()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods'   => ['POST']     // Request method only
        ]);
    }

    public function api_limit()
    {
        /**
         * API Limit
         * ----------------------------------
         * @param: {int} API limit Number
         * @param: {string} API limit Type (IP)
         * @param: {int} API limit Time [minute]
         */

        $this->_APIConfig([
            'methods'   => ['POST'],
            // number limit, type limit, time limit (last minute)
            'limit' => [10, 'ip', 5]
        ]);
    }

    public function api_key()
    {
        /**
         * Use API Key without Database
         * ---------------------------------------------------------
         * @param: {string} Types
         * @param: {string} API Key
         */

        $this->_APIConfig([
            'methods'   => ['POST'],

            //without database
            // 'key' => ['header', '123456'],

            //with database
            'key' => ['header'],
            'data' => ['is_login' => false] // custom data
        ]);

        $data = [
            'status'    => 'OK',
            'data'      => [
                'user_id'   => 12
            ]
        ];

        $this->api_return($data, 200);
    }

    public function login()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods' => ['POST'],
            //  'requireAuthorization' => true,
        ]);

        // you user authentication code will go here, you can compare the user with the database or whatever
        $payload = [
            'nama' => "Aulia Rahman",
            'tgl_lahir' => "1999-08-17",
            'umur' => 23,
            'pendidikan' => "D3",
        ];

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
