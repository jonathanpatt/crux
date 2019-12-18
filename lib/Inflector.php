<?php

class Inflector
{
    static public function camelize($str, $mixedCase = false)
    {
        if (!$mixedCase) {
            $str[0] = strtoupper($str[0]);
        }
        $func = function($c) {
            return strtoupper($c[1]);
        };

        return preg_replace_callback('/_([a-z])/', $func, $str);
    }

    static public function underscore($str)
    {
        $str[0] = strtolower($str[0]);
        $func = function($c) {
            return "_" . strtolower($c[1]);
        };

        return preg_replace_callback('/([A-Z])/', $func, $str);
    }
}
