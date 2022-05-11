<?php

namespace App\Helpers;


class StringHelper
{

    public function __construct()
    {
        
    }

    function mb_ucfirst($string)
    {
        $firstChar = mb_substr($string, 0, 1, 'utf8');
        $then = mb_substr($string, 1, null, 'utf8');
        return mb_strtoupper($firstChar, 'utf8') . $then;
    }
}