<?php

namespace App\Services;

use App\Models\User;

class Auth
{
    public static function user()
    {
        return $_SESSION['user_id'];
    }

    public static function login(int $user_id)
    {
        $_SESSION['user_id'] = $user_id;
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }
}
