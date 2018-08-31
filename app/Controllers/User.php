<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class User
{
    public function login()
    {
        return View::render('login');
    }

    public function restore()
    {
        return View::render('forgot-password');
    }

    public function registration()
    {
        return View::render('registration');
    }

    public function profile($userName)
    {
        return View::render('profile', ['user_name' => $userName]);
    }

    public function feed()
    {
        return View::render('feed');
    }

    public function settings()
    {
        return View::render('settings');
    }

    public function page404()
    {
        return View::render('404');
    }
}
