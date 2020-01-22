<?php

namespace app\controller;
use core\common\Utilty;

class Home
{
    public function __construct()
    {
        Utilty::bowser_no_cache();
    } 
}


?>