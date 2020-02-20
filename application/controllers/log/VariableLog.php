<?php
require_once APPPATH.'controllers/custom/LoggerController.php';


class VariableLog extends LoggerController{
    
    public function registerLogEvent($responseApi = null){
        echo "Insert en Log ".$responseApi->getIp();
    }
}
