<?php

namespace core;

use core\Route;
use core\Register;
use core\DoctrineDb;
use core\common\Utilty;

class skyapp
{
    public  $appProtocal;
    public  $appRegister;
    public $appDatabase;

    public function __construct()
    {
        
        $this->parse_app_protocal();
        $this->loadDatabase();
        $this->run();
    }

    public function run()
    {
        // echo  "當前協定:".$this->appProtocal->protocal."<br>";
        // echo  "當前app:".$this->appProtocal->url_host."<br>";
        // echo  "當前method:".$this->appProtocal->url_uri."<br>";
        

        echo  "當前controller:".$this->appProtocal->controller."<br>";
        echo  "當前controller_method:".$this->appProtocal->controller_method."<br>";

        $instanceCall =  $this->loadClassController($this->appProtocal->controller);
        // echo "將實例化的類別".$instanceCall."<br>";
        $this->bindInstanceTotree($instanceCall);
        $this->execInstanceMethod($this->appProtocal->controller_method);
    
    }

    private function loadDatabase()
    {
        $this->appDatabase = new  DoctrineDb();
        Register::set('appDoctrine', $this->appDatabase);
    }

    private function parse_app_protocal()
    {
           $this->appProtocal = new Route();
           $this->appProtocal->parseUrl();
    }

    private function loadClassController($klass)
    {
        $classLocate = APP."/controller/".strtolower($klass).".php";      

        if( file_exists($classLocate) && is_readable($classLocate)) {
            require  $classLocate;
        }else{
            
            Utilty::p('查無此控制器');
        }
    
        // 解除基本路徑
        $classNamesp = str_replace(BASEAPP,"",$classLocate);
    
       // 解除.php
       $classNamesp = str_replace(strtolower($klass).".php",ucfirst($klass),$classNamesp);
     
       //取得namespace
        $classpath = str_replace("/","\\",$classNamesp);


        return $classpath;

    }
    // 實例化對象
    private function bindInstanceTotree($klass)
    {
        $instance = new $klass;
         
        if(is_object($instance)){
            Register::set($this->appProtocal->controller, $instance);
        }else{
          
            Utilty::p("查無此控制器實例");
        }
   
    }
    // 實例化對象後,執行方法
    private function execInstanceMethod($method)
    {  
        $object = &Register::get($this->appProtocal->controller);

        if(method_exists($object,$method)){
            $object->$method();
        }else{

            Utilty::p("查無此方法");
        }

    }
 
    
}



?>