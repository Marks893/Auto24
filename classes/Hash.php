<?php

class Hash
{
    public static function make($str)
    {
        return password_hash($str, PASSWORD_DEFAULT);
    }

    public static function verify($hash, $str)
    {
        return password_verify($str, $hash);
    }
}