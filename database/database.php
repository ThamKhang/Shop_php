<?php
// file database.php
include_once('../config/config.php');

class Database {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function escape_string($string) {
        return $this->conn->real_escape_string($string);
    }

    public function last_insert_id() {
        return $this->conn->insert_id;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
