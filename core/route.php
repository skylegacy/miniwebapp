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

    public $slashArguments;
    public $queryArguments;

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
             $cutUri = explode("/",$url,4);
             $first =  array_shift($cutUri);

             $contrl =  array_shift($cutUri);
             $this->controller =  $contrl;
             $method =  array_shift($cutUri);
            
             $pureMethod =  explode("?",$method,2);
             $this->controller_method =$pureMethod[0] ;
             // 分為   問號參數 OR 斜槓參數
             
             $this->slashArguments = $cutUri;
             
           if( isset($pureMethod[1])){
               $this->queryArguments = $pureMethod[1];
                  echo  "---問號參數---";
                  print_r();
                  echo "<br>";
           }

           if($this->slashArguments!=null){
                  echo  "---斜槓參數---";
                  print_r($this->slashArguments);
                  echo "<br>";
           }
                  
                  
     }

     public function loadController($class)
     {
        
          $instance_class = ucfirst($class);
          return $instance_class;
      
     }


}



?>