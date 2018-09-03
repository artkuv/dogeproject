<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class ProfileController
{
    public function profile()
    {
        return View::render('profile');
    }
}
