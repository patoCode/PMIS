<?php
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
{
   
    public function __construct() {
        parent::__construct(); 
        $this->load->model('Usuario_model', 'usuario');
    }

    public function index_get($id = null){
        
        $data['usuarioList'] = $this->usuario->getAll();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $data['nombre'] = $this->input->post('nombre');
        $data['apellido'] = $this->input->post('apellido');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['email'] = $this->input->post('email');
        $this->usuario->insert($data);
        $this->response(['User created.'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id)
    {
        $this->usuario->delete(array('id_usuario' =>$id));
       
        $this->response(['User deleted successfully.'], REST_Controller::HTTP_OK);
    }

}
