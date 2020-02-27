<?php
require_once APPPATH.'controllers/custom/ApiController.php';

class User extends ApiController{

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Privilege_model', 'privilege');
    }

    public function create_post(){}
    public function update_post(){}
    public function delete_delete(){}
    public function list_get(){
        $data['list'] = $this->user->list();
        $this->response($data);
    }
    public function findById_post(){}

    public function login_post(){

        $username = $this->cleanData($this->post('username'));
        $password = $this->cleanData($this->post('password'));

        $userData = $this->isValid($username, $password);
        $privileges = null;

        if($userData != null){
            $privileges = $this->getPrivileges($userData->id_usuario);
            $user = $this->getUserInfo($userData->id_usuario);
            $responseApi = $this->generateToken($userData);
        }else{
            $responseApi = $this->emptyResponse(USER_NOT_FOUND);
        }
        $data = $this->responseSystem($responseApi, $user, $privileges);
        $this->response($data);
    }

    private function isValid($username, $password){
        $passwordCript = md5($password);
        // TODO: Check if user is ldap or local
        $res = $this->user->checkUser($username, $passwordCript);
        if($res != null){
            return $res;
        }else{
            return null;
        }
    }
    private function getUserInfo($idUser){
        return $this->user->findById($idUser);

    }
    private function getPrivileges($idUser){
        $res = $this->privilege->getPrivilegesByIdUser($idUser);
        return $res;
    }

}
