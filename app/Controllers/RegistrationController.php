<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class RegistrationController
{
    public function registration()
    {
        return View::render('register');
    }
}
