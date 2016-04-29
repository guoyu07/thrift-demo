<?php

namespace handler\tutorial;

class Duck implements \tutorial\DuckIf
{

    public function sleep($sec)
    {
        error_log("sleep($sec)");
        sleep($sec);
    }

    public function say($str) 
    {
        error_log("say($str)");
        return $str;
    }

};
