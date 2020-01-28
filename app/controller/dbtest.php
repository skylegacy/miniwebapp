<?php

namespace app\controller;
use core\Register;
use  app\model\Cat;


class Dbtest
{

    private $db;
     function  __construct()
     {
        $this->db = Register::get('appDoctrine');
     }

     public  function isl_user()
     {
        $sql = "SELECT * FROM isl_users";
        $stmt = $this->db ->conn->query($sql);

        echo "<h3>查詢會員資料</h3>";

        while ($row = $stmt->fetch()) {
            echo $row['user_username']."<br>";
        }
    }

    public function isl_vidcats()
    {
 
        // $stmt = $conn->prepare('SET names utf8mb4;');
        // THIS WILL NOT WORK:
       
        // $stmt->execute();

        $queryBuilder = $this->db ->conn->createQueryBuilder();

        $queryBuilder->select('*')->from('isl_vidcats');
        $stm = $queryBuilder->execute();
        $data = $stm->fetchAll();

       print_r($data);

    }

    public function db_orm()
    {
        echo '測試eloquen<br>';

        
         
       $cats = Cat::all()->toArray();
 
       echo "<pre>";
        print_r($cats);
    } 
}


?>