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
     * create a variable
     *
     * @return json
     */
    public function create_post(){
        $input = $this->input->post(NULL, TRUE);
        // ADD PARAMETERS TO DATA BASE
        $input['fecha_mod'] = date('Y-m-d H:i:s');
        $input['estado_reg'] = 'vigente';
        $this->variable->create($input);
        $this->response(array('MSG' => ' Creacion correcta','STATUS' => parent::HTTP_OK)); 
    }
    
    /**
     * update a variable from id
     *
     * @return json
     */
    public function update_post(){
        $input = $this->input->post(NULL, TRUE);
        $_id = $input['id_variable'];
        
        // ADD PARAMETERS TO DATA BASE
        $input['fecha_mod'] = date('Y-m-d H:i:s');
        $input['estado_reg'] = 'vigente';
        
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
        $_id = $this->input->post('id_variable');
        $data['variable'] = $this->variable->findById($_id);
        $this->response($data);
    }
    
}