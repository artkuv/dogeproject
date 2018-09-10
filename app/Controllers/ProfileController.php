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

class ProfileController extends Controller
{
    public function before()
    {
        if (User::isAuth() === false) {
            Controller::redirect("/login");
        }
    }

    public function profile()
    {

        $pathinfo = pathinfo($_SERVER['REQUEST_URI']);
        $getProfilName = $pathinfo['filename'];

        if (User::nameExist($getProfilName) === true) {
            $getProfile = User::getByName($getProfilName);
        } else {
            Controller::redirect("/");
        }

        $message = (isset($_POST['message'])) ? $_POST['message'] : '';
        if (!empty($message)) {
            Tweets::addTweet(array('user_id' => $_SESSION['id'], 'content' => $message));
        }

        $profile = User::getById($_SESSION['id']);
        
        $tweets = Tweets::getAllFromUser($getProfile['id']);
        
        return View::render('profile',['profile' => $profile, 'getProfile' => $getProfile, 'tweets' => $tweets]);

    }

    public function signOut()
    {
        session_destroy();
        unset($_COOKIE['email']);
        unset($_COOKIE['password']);
        Controller::redirect("/login");
    }
}
