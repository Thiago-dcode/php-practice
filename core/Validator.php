<?php

namespace Core;

class Validator
{

    public  static function string($str, $min = 3, $max = INF)
    {

        $value = trim($str);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
    public static function email($email)
    {

        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
