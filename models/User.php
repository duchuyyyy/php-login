<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "../helper/ConnectDatabase.php";
class User
{
    private $id;

    private $created_at;

    private $deleted_at;

    private $_username;

    private $_password;

    public function __construct($username, $password)
    {
        $this->_username = $username;
        $this->_password = $password;
    }

    public function getUsername()
    {
        return $this->_username;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function findByUsername($username)
    {
        $db = ConnectDatabase::getInstance();
        $query = $db->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $user !== false ? $user : false;
    }

    public function isCorrectUsernameAndPassword()
    {
        $user = $this->findByUsername($this->_username);

        if ($user !== false && password_verify($this->_password, $user['password'])) {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            return true;
        } else {
            return false;
        }
    }
}
?>