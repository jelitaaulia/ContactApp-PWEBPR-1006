<?php

include_once 'model/user_model.php';
include_once 'config/static.php';
include_once 'function/main.php';
include_once 'main.php';

class UserController {
    static function login() {
        view('user_page/login');
    }

    static function register() {
        view('user_page/register');
    }

    static function saveLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'email' => $post['email'], 
            'password' => $post['password']
        ]);
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: contacts');
        }
        else {
            header('Location: login?failed=true');
        }
    }

    static function saveRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::register([
            'firstname' => $post['firstname'], 
            'lastname' => $post['lastname'], 
            'email' => $post['email'], 
            'password' => $post['password']
        ]);

        if ($user) {
            header('Location: login');
        }
        else {
            header('Location: register?failed=true');
        }
    }

    static function logout() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header('Location: '.BASEURL);
    }

    static function forgotPassword() {}
}