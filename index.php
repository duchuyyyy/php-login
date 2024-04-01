<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION['user_id'])) {
    include_once "views/homepage.php";
} else {
    include_once "views/login.php";
}
?>