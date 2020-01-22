<?php 
 
 namespace  core\common;

 class Utilty
 {

    static function p($var){

        if(is_bool($var)){
            var_dump($var);
        }
        elseif(is_null($var)){
             var_dump(null);
        }
        else{
            echo '<pre style="postion:relative;z-index:1000;padding:10px;border-radius:5px;
            backround:#f5f5f5f5;border1px solid #aaa;font-size:14px;line-height:18px; ">'.print_r($var,true).'</pre>';
        }
    }
    
    static  function current_ptotocal(){
    
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
            $link = "https"; 
        else
            $link = "http"; 
        
        // Here append the common URL characters. 
        $link .= "://"; 
    
        // Print the link 
        return $link; 
    }

    static function get_Controller_Class(){

    }

    static function bowser_no_cache(){

        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }
    

 }


?>

