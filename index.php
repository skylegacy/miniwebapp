
<?php

// $title = 'This is a Websocket php service';

// echo '<h2>'.$title.'</h2>';

// define('BASEAPP',realpath('/'));
define('BASEAPP', realpath(__DIR__));
define('CORE',BASEAPP.'/core');
define('APP',BASEAPP.'/app');
define('DEBUG',true);

if(DEBUG){
        ini_set('display_error','On');
} else {
       ini_set('display_error','Off');
}

require  CORE.'/common/function.php';
require  CORE.'/register.php';
require  CORE.'/route.php';
require  CORE.'/skyapp.php';

require './vendor/autoload.php';
// print_r( CORE.'/common');
 
use \core\skyapp;
// p( CORE);
try {

 $app = new  skyapp();

}catch(Exception $e)
{
     echo $e->getMessage();
}



 

?>
