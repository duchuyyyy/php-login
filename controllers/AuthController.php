<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "../models/User.php";

class AuthController
{
    public function login($username, $password)
    {
        $user = new User($username, $password);

        if ($user->isCorrectUsernameAndPassword()) {
            header("Location: /views/homepage.php");
            exit();
        } else {
            header("Location: views/login.php");
            exit();
        }
    }

    public function invoke()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST["username"];
            $password = $_POST["password"];
            $this->login($username, $password);
        }
    }
}
;

$auth = new AuthController();
$auth->invoke();
?>