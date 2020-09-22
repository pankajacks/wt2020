<?php
require 'config.php';

$request = $_GET['req'] ?? "signin";

switch ($request) {
    case 'home':
        home();
        break;

    case 'auth':
        checkLogin($_POST);
        break;

    case 'reg':
        registration($_POST);
        break;

    case 'signin':
        require 'views/signin.php';
        break;

    case 'signup':
        require 'views/signup.php';
        break;

    case 'verify':
        verifyToken();
        break;
    
    default:
        http_response_code(401);    
        echo "Error";
        break;
}

function verifyToken() {
    if (isset($_GET['token'])) {
        require 'core/db.php';
        require 'user/user.php';
        require 'vendor/autoload.php';

        $user = new User((new Database())->connect());
        $token = $_GET['token'];
        if (strlen($token)==40) {
            $user->token = $_GET['token'];
            if ($user->verifyToken()) {
                require 'views/home.php';
                return;
            }
        }
        $data['error'] = true;
        $data['msg'] = 'In valid token Id.';
        require 'views/signup.php';
        
    }
}

function home() {
    require 'views/home.php';
}

function checkLogin($form) {
    if ( isset($form['email'], $form['password']) ) {
        require 'core/db.php';
        require 'user/user.php';

        $user = new User((new Database())->connect());

        $user->email = $form['email'];
        $user->password = $form['password'];

        if ($user->authenticate()) {
            // $_SESSION['user'] = $user->name;
            header('Location: index.php?req=home');
        }
    }
    $data['error'] = true;
    $data['msg'] = "Error: Invalid Login Credentials";
    require 'views/signin.php';
}

function registration($form) {
    require 'core/db.php';
    require 'user/user.php';
    require 'vendor/autoload.php';

    $db = new Database();
    $user = new User($db->connect());

    $user->name = $form['name'] ?? "";
    $user->email = $form['email'] ?? "";
    $user->username = $form['username'] ?? "";
    $user->password = $form['password'] ?? "";
    $rpassword = $form['rpassword'] ?? "";

    $data = array();

    if ($user->isUserExists()) {
        $data['error'] = true;
        $data['msg'] = "User Already Exists";
        require 'views/signup.php';
        return;
    }

    if (
        $user->name != "" && 
        $user->email != "" && 
        $user->username != "" &&
        $user->password != "" &&
        $user->password == $rpassword
        ) {
            if ( $user->signup() ) {
                $data['error'] = false;
                $data['msg'] = "Registred Successfully";
                require 'views/signin.php';
                return;
            }
    }
    $data['error'] = true;
    $data['msg'] = "Error: Registration Failed";
    require 'views/signup.php';
}


?>