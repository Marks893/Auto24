<?php

class Language
{
    public static function english()
    {
        return 'EN';
    }

    public static function estonian()
    {
        return 'ET';
    }

    public static function current()
    {
        return self::english();
    }
}