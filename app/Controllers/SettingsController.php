<?php

namespace App\Controllers;

use Framework\View;
/**
 *
 */
class SettingsController
{
    public function settings()
    {
        return View::render('settings');
    }
}
