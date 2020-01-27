<?php

namespace core;
 
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

 
class DoctrineDb
{

        private  $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'sky',
            'password' => 'sky9446080',
            'dbname'   => 'app_isl',
            'host' => '61.58.100.163',
            'charset'=>'utf8mb4'
        );

        private     $paths = array(APP.'/model');
        public      $conn = null;
        private     $isDevMode = true;
        private     $config;
        private     $entityManager;

        function  __construct()
        {
            
              $this->connect();
              require "start.php";
          
        }

        public function connect()
        {
            $this->conn = \Doctrine\DBAL\DriverManager::getConnection($this->dbParams);

        }

        
}


?>