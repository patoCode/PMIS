<?php
require_once APPPATH.'controllers/log/VariableLog.php';

class ApiResponse{
    private $msg;
    private $msgServer;
    private $status;
    private $result;
    private $token;
    private $varLog;
        
    function __construct($msg = null, $status = null, $result = null, $msgServer = null, $token = null){
        $this->msg = $msg;
        $this->msgServer = $msgServer;
        $this->status = $status;
        $this->result = $result;
        $this->token = $token;
        $this->varLog = new VariableLog();
    }
    public function getToken(){
        return $this->token;
    }
    public function setToken($token){
        $this->token = $token;
    }
    public function getMsg(){
        return $this->msg;
    }
    public function setMsg($msg){
        $this->msg = $msg;
    }
    public function getMsgServer(){
        return $this->msgServer;
    }
    public function setMsgServer($msgServer){
        $this->msgServer = $msgServer;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getResult(){
        return $this->result;
    }
    public function setResult($result){
        $this->result = $result;
    } 
    public function getVarLog():VariableLog{
        return $this->varLog;
    }
    public function setVarLog($varLog){
        $this->varLog = $varLog;
    } 
}