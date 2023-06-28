<?php 

namespace Database;

use mysqli;
use Exception;

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
        $this->conn->select_db($this->get_database_name());
        
        self::createTable();
    }

    public static function get_database_name() {
        return basename(dirname($_SERVER['PHP_SELF']));
    }

    public function createDB() {
        $databaseName = $this->get_database_name();

        $sql = "CREATE DATABASE $databaseName";
        if ($this->conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } 
    }
    
    public function tableQuery($table_name) {
        $users = "CREATE TABLE IF NOT EXISTS $table_name (
            id bigint(20) unsigned PRIMARY KEY AUTO_INCREMENT NOT NULL,
            name varchar(255) DEFAULT NULL,
            phone varchar(100) DEFAULT NULL,
            email varchar(255) DEFAULT NULL UNIQUE,
            email_verified_at DATETIME DEFAULT NULL,
            password varchar(255) NOT NULL,
            remember_token varchar(100) DEFAULT NULL,
            profile_photo_path varchar(1000) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
        )";

        return $users;
    }

    public function createTable() {
        try {
            $adminsTb = $this->conn->query($this->tableQuery('admins'));
            $supportsTb = $this->conn->query($this->tableQuery('supports'));
            $clientsTB = $this->conn->query($this->tableQuery('clients'));

            if ($adminsTb && $supportsTb && $clientsTB !== true) {
                echo "Error creating table: " . $this->conn->error;
            }
        } catch(Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function checkPassword($table, $password) {
        
    }
}

new Database();