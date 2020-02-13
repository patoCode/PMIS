<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/smarty-3/libs/Smarty.class.php');
 
/**
 * MySmarty Class
 *
 */
class Smartyci extends Smarty
{
  
    /**
     * constructor
     */
    function __construct()
    {
        parent::__construct();        
        $this->template_dir = APPPATH."/views/";
        $this->config_dir = APPPATH."/controllers/conf/";
        $this->compile_dir = APPPATH."/cache/";
    $this->caching = 0;       
    }
}