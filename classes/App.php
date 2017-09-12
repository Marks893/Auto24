<?php

class App
{
    private static $map = [];

    public static function set($key, $value)
    {
        self::$map[$key] = $value;
    }

    public static function resolve($key)
    {
        return self::$map[$key];
    }
}