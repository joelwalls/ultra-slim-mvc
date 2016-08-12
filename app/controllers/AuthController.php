<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\User;

/**
*  
*/
class AuthController extends Controller
{
    public function getLogin()
    {
        return $this->render('auth/login');
    }

    public function postLogin()
    {
        $auth = Auth::attempt(
            $this->request->getParam('email'), 
            $this->request->getParam('password')
        );
        
        if (!$auth) {
            return $this->response->withRedirect('login');
        } 

        return $this->response->withRedirect('home');
    }

    public function getSignUp()
    {
        return $this->render('auth/signup');
    }

    public function postSignUp()
    {
        $user = new User;
        $user->name = $this->request->getParam('name');
        $user->email = $this->request->getParam('email');
        $user->password = password_hash($this->request->getParam('password'), PASSWORD_BCRYPT);
        $user->save();

        return $this->response->withRedirect('login');
    }

    public function show()
    {
        echo Auth::user()->name;
    }
}