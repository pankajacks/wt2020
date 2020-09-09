<?php
session_start();

$req = $_GET['req'] ?? "home";
if (isset($_SESSION['user']) && ($req=="login" || $req=="home")) {
    header('Location: index.php?req=welcome');
}


$template = "templates/";

switch ($req) {
    case 'login':
        $title = "Login: My WebSite";
        $page_heading = "Login";
        $err = $_GET['err'] ?? "";
        $msg = "";
        if ($err == "invalid") {
            $msg = "In valid username and password";   
        }
        $template .= 'login.php';
        break;

    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: index.php?req=login');
        break;

    case 'auth':

        require 'core/auth.php';
        // require 'core/db.php';
        // $db = new Database();
        // $u = new User($db->connect());

        $u = new User();
        $u->username = $_POST['username'] ?? "";
        $u->password = $_POST['password'] ?? "";

        if ($u->checkUser()) {
            $_SESSION['user'] = $u->username;
            header('Location: index.php?req=welcome');
        } else {
            header('Location: index.php?req=login&err=invalid');
        }
        break;

    case 'welcome':
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?req=login');
        }
        $title = "Welcome: My WebSite";
        $page_heading = "Welcome";
        $template .= 'welcome.php';
        break;
    
    default:
        $title = "Home: My WebSite";
        $page_heading = "Home";
        $template .= 'home.php';
        break;
}

require 'common/header.php';
require $template;
require 'common/footer.php';

?>