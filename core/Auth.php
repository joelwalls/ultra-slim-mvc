<?php

namespace Core;

use App\Models\User;

/**
 * Authentication class
 */
class Auth
{
    
    /**
     * Attemps to login a use
     * @param  string $email    
     * @param  string $password 
     * @return bool           
     */
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

    /**
     * Returns the logged in User Object
     * @return App\Models\User 
     */
    public static function user()
    {
        return User::find($_SESSION['user']);
    }

    /**
     * Checks if a user is logged in
     * @return bool 
     */
    public static function check()
    {
        return isset($_SESSION['user']);
    }
}