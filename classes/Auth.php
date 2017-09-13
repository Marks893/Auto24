<?php

class Auth
{
    public static function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'role' => isset($user['user_group']) ? ((int)$user['user_group']) : User::standard()
        ];
    }

    public static function logout()
    {
        unset($_SESSION['user']);
    }

    public static function user()
    {
        if (!isset($_SESSION['user'])) return null;

        return $_SESSION['user'];
    }
}