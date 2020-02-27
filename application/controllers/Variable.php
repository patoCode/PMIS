<?php
require_once APPPATH.'controllers/custom/ApiController.php';

class Variable extends ApiController{

    /**
     * Constructor
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('Variable_model', 'variable');
    }

    /**
     * Create a variable
     *
     * @return json
     */
    public function create_post(){
        $data = array();
        $input = array_map('trim', $this->post(NULL, TRUE));

        //$responseApi = $this->verify_request();
        //if($responseApi->getResult() == 1){
            $responseApi = new ApiResponse();
            $input = $this->addValuesDataBase($input);
            $this->variable->create($input);
            $data = $this->responseSystem($responseApi,null, null, VARIABLE_CREATED);
        // }else{
        //     $data = $this->responseSystem($responseApi,null, null, VARIABLE_CREATION_ERROR);
        // }
        $this->set_response($data);
    }

    /**
     * Update a variable from id
     *
     * @return json
     */
    public function update_post(){
        $input = array_map('trim',$this->input->post(NULL, TRUE));
        $_id = $this->cleanData($input['id_variable']);

        $input = $this->addValuesDataBase($input);
        $this->variable->update($input, $_id);

        $this->response(array('MSG' => 'Update correcto del registro '.$_id,'STATUS' => parent::HTTP_OK));
    }

    /**
     * delete a variable from id
     *
     * @return json
     */
    public function delete_delete(){
        echo "method delete";
    }

    /**
     * list all variables
     *
     * @return void
     */
    public function list_get(){
        $data['list'] = $this->variable->list();
        $this->response($data);
    }

    /**
     * find a variable from id
     *
     * @return void
     */
    public function findById_post(){
        $_id = $this->cleanData($this->input->post('id_variable'));
        $data['variable'] = $this->variable->findById($_id);
        $this->response($data);
    }

}