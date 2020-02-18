<?php
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH.'controllers/custom/ApiResponse.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class ApiController extends REST_Controller
{
    public $responseApi;
    function __construct() {
        parent::__construct(); 
        $this->responseApi = new ApiResponse();
    }
    protected function verify_request():ApiResponse{
        $headers = $this->input->request_headers();
        $token = $headers['Authorization'];
        // JWT library throws exception if the token is not valid
        try {
            // Validate the token
            // Successfull validation will return the decoded user data else returns false
            
            $data = AUTHORIZATION::validateToken($token);
            if ($data === false) {
                $this->responseApi->setMsgServer(parent::HTTP_INTERNAL_SERVER_ERROR);
                $this->responseApi->setResult("2");
                $this->responseApi->setStatus(parent::HTTP_INTERNAL_SERVER_ERROR);
            } else {                             
                $this->responseApi->setMsgServer(parent::HTTP_OK);
                $this->responseApi->setResult("1");
                $this->responseApi->setStatus(parent::HTTP_OK);
            }
        } catch (Exception $e) {
            // Token is invalid
            // Send the unathorized access message            
            $this->responseApi->setMsgServer(parent::HTTP_UNAUTHORIZED);
            $this->responseApi->setResult("0");
            $this->responseApi->setStatus(parent::HTTP_UNAUTHORIZED);
        }
        return $this->responseApi;
    }
}
