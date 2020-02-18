<?php

abstract class LoggerController extends CI_Controller{
    
    private $_id;
    private $id;
    private $idForm;
    private $idVar;
    private $codigoVar;
    private $tipoVar;
    private $valorAnt;
    private $valorNuevo;
    private $uri;
    private $method;
    private $params;
    private $ip;
    private $response;
    private $key;
    private $usuarioReg;
    private $fechaReg;
        
    public function __construct($id = null, $idForm = null, $idVar = null, $codigoVar = null,  $tipoVar = null, $valorAnt = null, $valorNuevo = null, $uri = null, $method = null, $params = null, $ip = null, $response = null, $key = null, $usuarioReg = null, $fechaReg = null)
    {
        $this->id = $id;
        $this->idForm = $idForm;
        $this->idVar = $idVar;
        $this->codigoVar = $codigoVar;
        $this->tipoVar = $tipoVar;
        $this->valorAnt = $valorAnt;
        $this->valorNuevo = $valorNuevo;
        $this->uri = $uri;
        $this->method = $method;
        $this->params = $params;
        $this->ip = $ip;
        $this->response = $response;
        $this->key = $key;
        $this->usuarioReg = $usuarioReg;
        $this->fechaReg = $fechaReg;     
    }
    
    public function setIp($ip = null){
        $this->ip = $ip;
    }
    public function getIp(){
        return $this->ip;
    }
    
    
    /**
     * Abstract method needs to be implemented in the classes that extend
     */
    abstract public function registerLogEvent($responseApi);    
}
