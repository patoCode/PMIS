<?php
require_once APPPATH.'controllers/custom/ApiController.php';


class ApiExample extends ApiController
{
    private $logVar;
    
    public function __construct() {
        parent::__construct();    
        $this->logVar = new VariableLog(); 
        $this->load->model('Usuario_model', 'usuario');
    }

    public function index_get($id = null){        
        $responseApi = $this->verify_request();
        if($responseApi->getResult() == 1){
            $data['status'] = $responseApi->getStatus();
            $data['msgServer'] = $responseApi->getMsgServer();
            $data['result'] = $responseApi->getResult();
            $data['list'] = $this->usuario->getAll();                        
        }else{
            $data['status'] = $responseApi->getStatus();
            $data['msgServer'] = $responseApi->getMsgServer();
            $data['result'] = $responseApi->getResult();            
        }  
        $this->logVar->registerLogEvent($responseApi->getVarLog());
        $this->response($data);      
    }
    
    public function method_post()
    {
    }

}
