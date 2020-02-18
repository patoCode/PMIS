<?php
class Tracer {
   
    public function catchEvent()
    {
        // load the instance
        $this->CI =& get_instance();


        echo "Hola mundo";      
    }
}