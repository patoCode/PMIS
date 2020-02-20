<?php
require_once APPPATH.'controllers/custom/ApiController.php';

class Group extends ApiController{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Group_model', 'group');
    }
    
    public function create_post(){
        $data = array();
        $input = $this->input->post(NULL, TRUE);        
        $fechaMod = date('Y-m-d H:i:s');
        // ADD PARAMETERS TO DATA BASE
        $input['fecha_mod'] = $fechaMod;
        $input['estado_reg'] = ESTADO_REG_VALID;
        
        $responseApi = $this->verify_request();
        if($responseApi->getResult() == 1){
            $this->group->create($input);
            $data = $this->responseSystem($responseApi,null, null, GROUP_CREATED);            
        }else{            
            $data = $this->responseSystem($responseApi,null, null, GROUP_CREATION_ERROR); 
        }
        $this->set_response($data); 
    }
    
    public function update_post(){
        
    }
    public function delete_delete(){}
    public function list_get(){
        $data['list'] = $this->group->list();
        $this->response($data);
    }
    public function findById_post(){}
        
    public function addVariable_post(){
        // variable es nueva
        // variable ya existe
        // variable quiere eliminarse
    }
    
}