<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\View;
use App\Models\User;
/**
 *
 */
class RegistrationController extends Controller
{
    public function registration()
    {
        return View::render('register', ['name' => '', 'email' => '']);
    }

    public function save()
    {
        $error = array();
        $name = (isset($_POST['name'])) ? $_POST['name'] : '';
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $password = (isset($_POST['password'])) ? $_POST['password'] : '';


            if (empty($name) || empty($email) || empty($password)) {

                $error[] = "Form fields can not be empty.";

            } else {
                if (User::emailExist($email) === true) {

                    $error[] = "This email already exist.";

                }
                if (User::nameExist($name) === true) {

                    $error[] = "This name already exist.";

                }
            }

            if (count($error) === 0) {
                $params = array('email' => $email, 'password' => $password, 'name' => $name);
                User::create($params); //add new user in base
                Controller::redirect("/login");
            }

        return View::render('register', ['error' => $error, 'name' => $name, 'email' => $email]);
    }
}
