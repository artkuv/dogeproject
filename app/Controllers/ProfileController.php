<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\View;
use Framework\Model;
use App\Models\User;
use App\Models\Tweets;
use App\Models\Followers;
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

        $isFollow = Followers::isFollow($_SESSION['id'], $getProfile['id']);

        if ($isFollow === false) {

            $followId = (isset($_POST['followId'])) ? $_POST['followId'] : '';
            if (!empty($followId) && $followId != $_SESSION['id'] && User::idExist($followId)) {
                if (Followers::Follow($_SESSION['id'], $followId)) {
                    Controller::redirect("/profile/" . $getProfile['name']);
                }
            }

        }

        if ($isFollow === true) {

            $unFollowId = (isset($_POST['unFollowId'])) ? $_POST['unFollowId'] : '';
            if (!empty($unFollowId) && $unFollowId != $_SESSION['id'] && User::idExist($unFollowId)) {
                if (Followers::unFollow($_SESSION['id'], $unFollowId)) {
                    Controller::redirect("/profile/" . $getProfile['name']);
                }
            }

        }

        
        $tweets = Tweets::getAllFromUser($getProfile['id']);
        
        return View::render('profile',['profile' => $profile, 'getProfile' => $getProfile, 'tweets' => $tweets, 'isFollow' => $isFollow]);

    }

    public function signOut()
    {
        session_destroy();
        unset($_COOKIE['email']);
        unset($_COOKIE['password']);
        Controller::redirect("/login");
    }
}
