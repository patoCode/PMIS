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

    public function get_id(){
		return $this->_id;
	}

	public function set_id($_id){
		$this->_id = $_id;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdForm(){
		return $this->idForm;
	}

	public function setIdForm($idForm){
		$this->idForm = $idForm;
	}

	public function getIdVar(){
		return $this->idVar;
	}

	public function setIdVar($idVar){
		$this->idVar = $idVar;
	}

	public function getCodigoVar(){
		return $this->codigoVar;
	}

	public function setCodigoVar($codigoVar){
		$this->codigoVar = $codigoVar;
	}

	public function getTipoVar(){
		return $this->tipoVar;
	}

	public function setTipoVar($tipoVar){
		$this->tipoVar = $tipoVar;
	}

	public function getValorAnt(){
		return $this->valorAnt;
	}

	public function setValorAnt($valorAnt){
		$this->valorAnt = $valorAnt;
	}

	public function getValorNuevo(){
		return $this->valorNuevo;
	}

	public function setValorNuevo($valorNuevo){
		$this->valorNuevo = $valorNuevo;
	}

	public function getUri(){
		return $this->uri;
	}

	public function setUri($uri){
		$this->uri = $uri;
	}

	public function getMethod(){
		return $this->method;
	}

	public function setMethod($method){
		$this->method = $method;
	}

	public function getParams(){
		return $this->params;
	}

	public function setParams($params){
		$this->params = $params;
	}

	public function getIp(){
		return $this->ip;
	}

	public function setIp($ip){
		$this->ip = $ip;
	}

	public function getResponse(){
		return $this->response;
	}

	public function setResponse($response){
		$this->response = $response;
	}

	public function getKey(){
		return $this->key;
	}

	public function setKey($key){
		$this->key = $key;
	}

	public function getUsuarioReg(){
		return $this->usuarioReg;
	}

	public function setUsuarioReg($usuarioReg){
		$this->usuarioReg = $usuarioReg;
	}

	public function getFechaReg(){
		return $this->fechaReg;
	}

	public function setFechaReg($fechaReg){
		$this->fechaReg = $fechaReg;
	}

    /**
     * Abstract method needs to be implemented in the classes that extend
     */
    abstract public function registerLogEvent($responseApi);
}
