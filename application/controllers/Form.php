<?php
require_once APPPATH.'controllers/custom/ApiController.php';

class Form extends ApiController{

    public function __construct(){
        parent::__construct();
        $this->load->model('Form_model', 'form');
        $this->load->model('GroupForm_model', 'groupform');
    }

    public function create_post(){
        $data = array();
        $input = array_map('trim', $this->post(NULL, TRUE));
        //$responseApi = $this->verify_request();
        // if($responseApi->getResult() == 1){
            $responseApi = new ApiResponse();
            $input = $this->addValuesDataBase($input);
            $this->form->create($input);
            $data = $this->responseSystem($responseApi,null, null, FORM_CREATED);
        // }else{
        //     $data = $this->responseSystem($responseApi,null, null, FORM_CREATION_ERROR);
        // }
        $this->set_response($data);
    }
    public function update_post(){}
    public function delete_delete(){}
    public function list_get(){
        $data['list'] = $this->form->list();
        $this->response($data);
    }
    public function findById_post(){}

    /**
     * Add group to form
     *
     * @return JSON response
     */
    public function addGroup_post(){
        $idGroup = $this->cleanData($this->post('id_grupo'));
        $idForm= $this->cleanData($this->post('id_formulario'));
        $msg = 'El grupo '.$idGroup.' no puede ser agregado al formulario '.$idForm;

        if($this->groupform->checkGroup($idGroup, $idForm)){
            $input = array_map('trim', $this->post(NULL, TRUE));

            // ADD PARAMETERS TO DATA BASE
            $input = $this->addValuesDataBase($input);

            $this->groupform->create($input);
            $msg = 'El grupo '.$idGroup.' fue agregado al formulario '.$idForm;
        }
        return $this->response(array('msg'=> $msg));

    }

    public function listGroupInForm_get($idForm){
        $data['list'] = $this->groupform->listGroup($idForm);
        $this->response($data);
    }
}