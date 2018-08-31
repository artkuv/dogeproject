<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class TestController
{
    public function hello($userName = 'world')
    {
        return View::render('register', ['user_name' => $userName]);
    }
}
