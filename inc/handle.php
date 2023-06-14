<?php
include_once('config/config.php');

class Database
{
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}