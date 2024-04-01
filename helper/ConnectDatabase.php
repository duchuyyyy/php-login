<?php

class ConnectDatabase
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        // Create PDO connection
        $dsn = "mysql:host=mysql;dbname=default;charset=utf8mb4";
        $username = "default";
        $password = "secret";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ConnectDatabase();
        }
        return self::$instance;
    }

    public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }
}
?>