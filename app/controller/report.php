<?php

namespace app\controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report
{

    function __construct()
    {
    
        try {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            echo "==PhpSpreadsheet异常==";
            var_dump($e);
          
        }
    }

    function init()
    {
        echo '可以用phpspread了';
    }

}


?>