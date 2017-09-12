<?php

class Request
{
    public static function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    public static function canViewAdminArea()
    {
        if (!self::isAuthenticated()) return false;

        return Auth::user()['role'] === User::admin();
    }
}