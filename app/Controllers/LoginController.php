<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class LoginController
{
    public function login()
    {
        return View::render('login');
    }
}
