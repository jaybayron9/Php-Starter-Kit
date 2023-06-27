<?php 

class Database {
    protected $conn;

    public function __construct() {
        $config = require('config.php');

        extract($config['mysql']);

        try {
            $this->conn = new mysqli($localhost, $username, $password);
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        $this->createDB();
    }

    public function createDB() {
        $parentFolder = basename(dirname($_SERVER['PHP_SELF']));

        $sql = "CREATE DATABASE $parentFolder";
        if ($this->conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } 
    }
}

new Database();