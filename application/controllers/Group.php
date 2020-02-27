<?php
require_once APPPATH.'controllers/custom/ApiController.php';

class Group extends ApiController{

    public function __construct(){
        parent::__construct();
        $this->load->model('Group_model', 'group');
        $this->load->model('VariableGroup_model', 'variablegroup');
    }
    /**
     * Create group
     *
     * @return JSON response
     */
    public function create_post(){
        $data = array();
        $input = array_map('trim', $this->post(NULL, TRUE));

        // ADD PARAMETERS TO DATA BASE


        // $responseApi = $this->verify_request();
        // if($responseApi->getResult() == 1){
            $responseApi = new ApiResponse();
            $input = $this->addValuesDataBase($input);
            $this->group->create($input);
            $data = $this->responseSystem($responseApi,null, null, GROUP_CREATED);
        // }else{
        //     $data = $this->responseSystem($responseApi,null, null, GROUP_CREATION_ERROR);
        // }
        $this->set_response($data);
    }

    public function update_post(){ }
    public function delete_delete(){}
    /**
     * get list of group
     *
     * @return JSON response
     */
    public function list_get(){
        $data['list'] = $this->group->list();
        $this->response($data);
    }
    public function findById_post(){}

    public function detailVariable_post(){}

    /**
     * add variable to select group
     *
     * @param [array:any] $input
     * @return JSON response
     */
    public function addVariable_post(){
        $idVariable = $this->cleanData($this->post('id_variable'));
        $idGroup = $this->cleanData($this->post('id_grupo'));
        $msg = 'La variable '.$idVariable.' no puede ser agregada al grupo '.$idGroup;

        if($this->variablegroup->checkVariable($idVariable, $idGroup)){
            $input = array_map('trim', $this->post(NULL, TRUE));
            // ADD PARAMETERS TO DATA BASE
            $input = $this->addValuesDataBase($input);
            // NEW VARIABLE
            $this->variablegroup->create($input);
            $msg = 'La variable '.$idVariable.' fue agregada al grupo '.$idGroup;
        }
        return $this->response(array('msg'=> $msg));
    }

    public function updateVariable_post($input){}
    public function deleteVariable_delete($idVariable) {}
    /**
     * get list of variables of a group -> idGroup
     *
     * @param [int] $idGroup
     * @return JSON response
     */
    public function listVariableInGroup_get($idGroup){
        $data['list'] = $this->variablegroup->listVariable($idGroup);
        $this->response($data);
    }

}