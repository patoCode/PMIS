<?php
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH.'controllers/custom/ApiResponse.php';


abstract class ApiController extends REST_Controller
{
    public $responseApi;
    function __construct() {
        parent::__construct();
        $this->responseApi = new ApiResponse();
    }
    /**
     * Undocumented function
     *
     * @param [any] $input
     * @return $input clean blank field
     */
    protected function cleanData($input){
        return trim($input);
    }
    /**
     * Response generic for api
     *
     * @param [object: ApiResponse] $apiResponse
     * @param [object: any] $element
     * @param [array<Object>: any] $elementList
     * @param [string] $msg
     * @return array
     */
    protected function responseSystem($apiResponse, $element = null, $elementList = null, $msg = null):array{
        $data = array();
        if($apiResponse != null){
            $data['result'] = $apiResponse->getResult();
            $data['msgServer'] = $apiResponse->getMsgServer();
            $data['status'] = $apiResponse->getStatus();

            if($apiResponse->getToken() != null)
                $data['token'] = $apiResponse->getToken();
            if($apiResponse->getresult() == 1){
                if($element != null)
                    $data['element'] = $element;
                if($elementList != null)
                    $data['elmentList'] = $elementList;
                if($msg != null){
                    $data['msg'] = $msg;
                }
            }else{

                if($msg != null){
                    $data['msg'] = $msg;
                }else{
                    if( $apiResponse->getMsg() != '')
                        $data['msg'] = $apiResponse->getMsg();
                    else
                        $data['msg'] = RESPONSE_RESULT_0;
                }
            }
        }else{
            $data['result'] = 3;
            if($msg != null){
                $data['msg'] = $msg;
            }else{
                if($apiResponse->getMsg() != '')
                    $data['msg'] = $apiResponse->getMsg();
                else
                    $data['msg'] = RESPONSE_NULL;
            }
        }
        return $data;

    }

    /**
     * Return an empty ApiResponse object in case of neding it
     *
     * @param [string] $msg cant be null
     * @return ApiResponse
     */
    protected function emptyResponse($msg = null):ApiResponse{
        if($msg != null)
            $this->responseApi->setMsg($msg);
        $this->responseApi->setStatus(parent::HTTP_OK);
        $this->responseApi->setMsgServer(parent::HTTP_NO_CONTENT);
        $this->responseApi->setResult("0");
        return $this->responseApi;
    }

    /**
     * Generate JWT token with the user's data
     *
     * @param [array: any] $data
     * @return ApiResponse
     */
    protected function generateToken($data):ApiResponse{
        $token = AUTHORIZATION::generateToken($data);
        $this->responseApi->setToken('Bearer '.$token);
        $this->responseApi->setStatus(parent::HTTP_OK);
        $this->responseApi->setMsgServer(parent::HTTP_OK);
        $this->responseApi->setResult("1");
        return $this->responseApi;
    }

    /**
     * Check the user's token
     *
     * @return ApiResponse
     */
    protected function verify_request():ApiResponse{
        $varLog = new VariableLog();
        $headers = $this->input->request_headers();
        $token = $headers['Authorization'];
        $varLog = $this->responseApi->getVarLog();

        $varLog->setIp($this->input->ip_address());

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
            $this->responseApi->setMsgServer(parent::HTTP_UNAUTHORIZED);
            $this->responseApi->setResult("0");
            $this->responseApi->setStatus(parent::HTTP_UNAUTHORIZED);
        }

        $this->responseApi->setVarLog($varLog);
        return $this->responseApi;
    }
    /**
     * Add control information to the database
     *
     * @param [array] $input -> POST -> GET
     * @return array
     */
    protected function addValuesDataBase($input):array{
        $res = $input;
        $res['fecha_mod'] = date('Y-m-d H:i:s');
        $res['estado_reg'] = ESTADO_REG_VALID;
        return $res;
    }

    abstract public function create_post();
    abstract public function update_post();
    abstract public function delete_delete();
    abstract public function list_get();
    abstract public function findById_post();



}
