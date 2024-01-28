<?php 

namespace Core;

class Dump
{
    public static function dd($variable)
    {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        die();
    }
}