<?php
class ApiResponse{
    private $msg;
    private $msgServer;
    private $status;
    private $result;
    
    function __construct($msg = null, $status = null, $result = null, $msgServer = null){
        $this->msg = $msg;
        $this->msgServer = $msgServer;
        $this->status = $status;
        $this->result = $result;
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
}