<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class Page404Controller
{
    public function page404()
    {
        return View::render('404');
    }
}
