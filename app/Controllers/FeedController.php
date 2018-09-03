<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class FeedController
{
    public function feed()
    {
        return View::render('feed');
    }
}
