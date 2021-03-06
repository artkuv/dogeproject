<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\View;
use Framework\Model;
use App\Models\User;

/**
 *
 */
class LoginController extends Controller
{

    public function before()
    {
        if (User::isAuth() === true) {
            Controller::redirect("/profile/" . $_SESSION['name']);
        }
    }

    public function login()
    {
        return View::render('login', ['email' => '']);
    }

    public function enter()
    {
        $error = array();
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $password = (isset($_POST['password'])) ? $_POST['password'] : '';
        $remember = (isset($_POST['remember'])) ? $_POST['remember'] : '';

            if(empty($email) || empty($password)) {

                $error[] = "Form fields can not be empty.";

            } else {

                if (User::login($email, $password) > 0) {

                    $name = User::getNameByEmail($email);
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = User::getIdByEmail($email);
                    
                    if ($remember == 'on') {
                        setcookie('email', $email, time() + 3600*24*30);
                        setcookie('password', User::hashPassword($password), time() + 3600*24*30);
                    }
                    
                    Controller::redirect("/profile/" . $name);

                } else {

                    $error[] = "Email or password is wrong.";

                }
            }

        return View::render('login', ['error' => $error, 'email' => $email]);
    }

}
