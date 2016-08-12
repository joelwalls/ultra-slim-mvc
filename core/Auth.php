<?php

namespace Core;

use App\Models\User;

/**
*  
*/
class Auth
{
    
    public static function attempt($email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user->password)) {
            return false;
        }

        $_SESSION['user'] = $user->id;

        return true;
    }

    public static function user()
    {
        return User::find($_SESSION['user']);
    }

    public static function check()
    {
        return isset($_SESSION['user']);
    }
}