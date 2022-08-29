<?php

namespace Helpers;

class HTTP
{
    static $base = "http://localhost:8888";

    static function redirect($part, $query= "") 
    {
        $url = static::$base . $part;
        if($query){
            $url.= "?$query";
        }
        header("location: $url");
        exit();
    }
}