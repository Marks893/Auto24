<?php

class Language
{
    public static function english()
    {
        return 1;
    }

    public static function estonian()
    {
        return 2;
    }

    public static function default()
    {
        return self::english();
    }

    public static function current()
    {
        if (!isset($_SESSION['language']))
            $_SESSION['language'] = self::default();

        return $_SESSION['language'];
    }

    public static function set($lang)
    {
        $_SESSION['language'] = $lang;
    }
}