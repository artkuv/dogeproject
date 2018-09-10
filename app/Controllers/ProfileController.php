<?php

namespace App\Controllers;

use Framework\View;
use Framework\Model;
use App\Models\User;
use App\Models\Tweets;
/**
 *
 */
class ProfileController
{
    public function __construct()
    {
        if (User::isAuth() === false) {
            header("Location: /login");
            die();
        }
    }

    public function profile()
    {

        $pathinfo = pathinfo($_SERVER['REQUEST_URI']);
        $profilName = $pathinfo['filename'];

        if (User::nameExist($profilName) === true) {
            $profile = User::getByName($profilName);
        } else {
            header("Location: /");
        }

        $message = (isset($_POST['message'])) ? $_POST['message'] : '';
        if (!empty($message)) {
            Tweets::addTweet(array('user_id' => $_SESSION['id'], 'content' => $message));
        }

        $tweets = Tweets::getAllFromUser($profile['id']);
        
        return View::render('profile',['profile' => $profile, 'tweets' => $tweets]);

    }
}
