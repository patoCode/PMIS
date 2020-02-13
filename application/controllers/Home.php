<?php
class Home extends CI_Controller
{
    

    public function __construct() {
        parent::__construct();     
    }

    public function index()
    {
        $smarty = new Smartyci;
        $zapatos = array();
        $z1 =  array("color" => "negro", "numero" => "20", "marca" =>"nike");
        $z2 =  array("color" => "verde", "numero" => "20", "marca" =>"nike");
        $z3 =  array("color" => "azul", "numero" => "20", "marca" =>"nike");

        array_push($zapatos, $z1);
        array_push($zapatos, $z2);
        array_push($zapatos, $z3);

        
        
        $smarty->assign('title', 'Test titule');
        $smarty->assign('description', 'Test Description');
        $smarty->assign('zapatos', $zapatos);
        $smarty->assign('elementos', 'next x-men film, x3, delayed.');
        $smarty->assign('number', 1520.5756);
        
        $smarty->display('home.tpl');
    }

    public function demo(){
        $smarty = new Smartyci;
        $smarty->display('demo.tpl');
    }
}
