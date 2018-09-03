<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class RestoreController
{
    public function restore()
    {
        return View::render('forgot-password');
    }
}
