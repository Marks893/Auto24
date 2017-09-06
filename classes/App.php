<?php

/**
 * Created by PhpStorm.
 * User: opilane
 * Date: 06.09.2017
 * Time: 13:44
 */
class App
{
    private static $map = [
        'name' => 'Auto24',
        'config.db' => [
            'name' => 'TAK15_Penza',
            'user' => 'TAK15_Penza',
            'password' => '123456'
        ]
    ];

    public static function set($key, $value)
    {
        self::$map[$key] = $value;
    }

    public static function resolve($key)
    {
        return self::$map[$key];
    }
}