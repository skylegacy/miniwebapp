<?php

namespace app\controller;
use core\common\Utilty;

class Home
{
    private $parentCates;
    private $rowChance;
    private $aLen;
    private $calcToalarr;
    private $rowChBatch;
    public function __construct()
    {
        Utilty::bowser_no_cache();

        $this->parentCates = array(
            '類別1',
            '類別2',
            '類別3',
            '類別4',
        );

        $this->rowChance = array(
            0.25,
            0.25,
            0.25,
            0.25
        );
        $this->rowChBatch = array();

        // $this->ptrLen = 100;
        $this->cardiNum = 100;
        $this->calcToalarr = array();

    } 

    public function calc_ch()
    {
        $this->setRealCateQty();
        print_r($this->rowChance);
        echo "<pre>";
        print_r($this->rowChBatch);
        //將比例轉為實際數量
        
        $temp = shuffle($this->calcToalarr);
        echo "<pre>";
        print_r($this->calcToalarr);

        echo "總數量:".count($this->calcToalarr);

        print_r(array_count_values($this->calcToalarr));
    }
    //賦予類別值
    private function setRealCateQty()
    {
        $startPtr = 0;
        $endPtr = 0;
        for($i=0;$i<count($this->rowChance);$i++){
            
            $startPtr = $endPtr;
            $this->rowChBatch[$i]['startPoint'] = $startPtr+1;
            $endPtr = $startPtr + $this->rowChance[$i]*$this->cardiNum;
            $this->rowChBatch[$i]['endPoint'] =  $endPtr;
            $this->rowChBatch[$i]['cateName'] = $this->parentCates[$i];
            
            $this->getChanceBase($startPtr,$endPtr,$this->rowChBatch[$i]['cateName']);
        }
    }
    //賦予索引值
    private function getChanceBase($phaseStart,$phaseEnd,$value)
    {
        $end = $phaseEnd;
        $start = $phaseStart;
         
        // for($start;$start<$end;$start++){

        //     $index = rand(0,$end-1);
            
        //     if(!array_key_exists($index,$this->calcToalarr)){
        //         $this->calcToalarr[$index] = $value;        
        //      }else{
        //         while (array_key_exists($index,$this->calcToalarr)) {
        //             $index = rand(0,$end-1);
        //             if(!array_key_exists($index,$this->calcToalarr)){
        //                 break;        
        //              }
        //         }
        //         $this->calcToalarr[$index] = $value;        
        //      }
            
        // }
 
        for($start;$start<$end;$start++){
            $index = $start;
            $this->calcToalarr[$index] = $value;
        }
    }
}


?>