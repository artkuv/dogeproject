<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\View;
use Framework\Model;
use App\Models\User;
use App\Models\Tweets;
/**
 *
 */
class FeedController extends Controller
{
    public function before()
    {
        if (User::isAuth() === false) {
            Controller::redirect("/login");
        }
    }

    public function globalFeed()
    {
        $profile = User::getById($_SESSION['id']);
        $tweets = Tweets::getAll();

        return View::render('feed', ['profile' => $profile, 'tweets' => $tweets]);
    }

    public function feed()
    {
        $profile = User::getById($_SESSION['id']);
        $tweets = Tweets::getFollowsTweets($_SESSION['id']);

        return View::render('feed', ['profile' => $profile, 'tweets' => $tweets]);
    }
}
