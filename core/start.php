<?php

require "vendor/autoload.php";
//If you want the errors to be shown  *是否显示错误
// error_reporting(E_ALL);

// ini_set('display_errors', '1');

use Illuminate\Database\Capsule\Manager as Capsule;

 $capsule = new Capsule;

 $capsule->addConnection([
    "driver" => "mysql",
    "host" =>"127.0.0.1",
    "database" => "app_isl",
    "username" => "sky",
    "password" => "sky9446080",
    'charset'=>'utf8mb4'
 ]);

//Make this Capsule instance available globally. *要让 capsule 能在全局使用
 $capsule->setAsGlobal();
// Setup the Eloquent ORM.
 $capsule->bootEloquent();

 echo "連線laravelORM<br>";

?>