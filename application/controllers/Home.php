<?php

class Home extends CI_Controller
{
    //var $smarty = new Smartyci();
    
    
    public function __construct() {
        parent::__construct(); 
        $this->load->model('Usuario_model', 'usuario');       
    }

    public function index()
    {
       $this->smartyview->assign('saludo', 'saludo desde template controller');
       $this->smartyview->display('saludo.tpl');
    }

    public function demo(){        
    }

    public function demoInsert(){        
    }

    public function demoTemplate(){        
    }
}
