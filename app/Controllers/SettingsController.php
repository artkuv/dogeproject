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
class SettingsController extends Controller
{
     public function before()
    {
        if (User::isAuth() === false) {
            Controller::redirect("/login");
        }
    }

    public function settings()
    {
        $profile = User::getById($_SESSION['id']);

        $postName = (isset($_POST['name'])) ? $_POST['name'] : $profile['name'];
        $postEmail = (isset($_POST['email'])) ? $_POST['email'] : $profile['email'];
        $postAbout = (isset($_POST['about'])) ? $_POST['about'] : $profile['about'];
        $postAvatar = (isset($_FILES['avatar'])) ? $_FILES['avatar'] : $profile['avatar'];
        $postNewPassword = (isset($_POST['newPassword'])) ? $_POST['newPassword'] : '';
        $postCurrentPassword = (isset($_POST['currentPassword'])) ? $_POST['currentPassword'] : '';

        $succes = false;
        $error = array();

        if (count($_POST) > 3) {
            if ($profile['password'] != User::hashPassword($postCurrentPassword)) {
                $error[] = 'If you want save your settings you should enter correct current password!';
            } else {
                if ($profile['name'] != $postName) {
                    if (User::nameExist($postName)) {
                        $error[] = "This login already exist, please choose another login.";
                    } else {
                        if (User::changeName($postName, $profile['id'])) {
                            $succes = true;
                        }
                    }
                }

                if ($profile['email'] != $postEmail) {
                    if (User::emailExist($postEmail)) {
                        $error[] = "This email already exist, please choose another email.";
                    } else {
                        if (User::changeEmail($postEmail, $profile['id'])) {
                            $succes = true;
                        }
                    }
                }

                if ($profile['about'] != $postAbout) {
                    
                    if (User::changeAbout($postAbout, $profile['id'])) {
                        $succes = true;
                    }
                    
                }

                if (!empty($postNewPassword)) {
                    if (User::changePassword($postPassword, $profile['id'])) {
                        $succes = true;
                    }
                }

                if (!empty($postAvatar)) {
                    if (move_uploaded_file($postAvatar['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . AVATAR_DIR . $profile['id'] . '.jpg')) {
                        if (User::changeAvatar(AVATAR_DIR . $profile['id'] . '.jpg', $profile['id'])) {
                            $succes = true;
                        }
                    } else {
                        $error[] = "Avatar doesn't uploaded.";
                    }
                }


            }
        }
        return View::render('settings', ['profile' => $profile, 'error' => $error, 'succes' => $succes]);
    }
}
