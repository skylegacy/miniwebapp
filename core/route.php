<?php

namespace core;

use core\common\Utilty;
 

class Route
{
    
    public $url_host;
    public $url_uri;
    public $protocal;

    public $controller;
    public $controller_method;

    function __construct()
    {
            $this->protocal =  Utilty::current_ptotocal();
    }

    public function parseUrl()
     {
            $this->url_host = $_SERVER['HTTP_HOST']; 
            $this->url_uri =  $_SERVER['REQUEST_URI']; 
            $this->parseMethod($this->url_uri );
     }

     private function parseMethod($url)
     {
             $cutUri = explode("/",$url);
             $this->controller =  $cutUri[1];
             $this->controller_method = $cutUri[2];
     }

     public function loadController($class)
     {
        
          $instance_class = ucfirst($class);
          return $instance_class;
      
     }


}



?>