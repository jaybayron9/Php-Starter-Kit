<?php 

namespace DBConn;

use PDO;
use PDOException;

class DBConn {
    protected static $conn;

    public function __construct() {
        $config = require('config.php');

        extract($config['mysql']);

        try {
            $dsn = "mysql:host=$localhost;dbname=$database;charset=utf8mb4";
            self::$conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function __destruct() {
        self::$conn = null;
    }

    public function backupDatabase() {
        $backupFilename = 'backup.sql';
    
        $backupFile = fopen($backupFilename, 'w');
    
        $tables = array();
        $result = self::$conn->query("SHOW TABLES");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }
    
        foreach ($tables as $table) {
            $result = self::$conn->query("SHOW CREATE TABLE $table");
            $row = $result->fetch(PDO::FETCH_NUM);
            fwrite($backupFile, $row[1] . ";\n");
    
            $result = self::$conn->query("SELECT * FROM $table");
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $rowData = implode("','", $row);
                fwrite($backupFile, "INSERT INTO $table VALUES ('$rowData');\n");
            }
        }
    
        fclose($backupFile);

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($backupFilename) . '"');
        header('Content-Length: ' . filesize($backupFilename));
        readfile($backupFilename);
    }
    
    public static function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        $stmt = self::$conn->prepare($query);
        $stmt->execute(array_values($data));
    }

    public static function update($tableName, $data, $whereClause) {
        $query = "UPDATE $tableName SET ";
        $updateValues = [];
    
        foreach ($data as $column => $value) {
            $updateValues[] = "$column = :$column";
        }
    
        $query .= implode(", ", $updateValues) . " WHERE $whereClause";
        try {
            $statement = self::$conn->prepare($query);
    
            foreach ($data as $column => $value) {
                $statement->bindValue(":$column", $value);
            }
    
            $statement->execute();
    
            return $statement->rowCount();
        } catch (PDOException $e) {
            return self::alert('error', $e->getMessage());
        }
    }

    public static function select($table, $columns = '*', $where = null, $orderBy = null, $limit = null, $joins = []) {
        $query = "SELECT $columns FROM $table";
        
        foreach ($joins as $join) {
            $joinTable = $join['table'];
            $joinCondition = $join['condition'];
            $query .= " JOIN $joinTable ON $joinCondition";
        }
        
        if ($where) {
            $conditions = [];
            foreach ($where as $column => $value) {
                $conditions[] = "$column = :$column";
            }
            $query .= " WHERE " . implode(' AND ', $conditions);
        }
        
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }
        
        if ($limit) {
            $query .= " LIMIT $limit";
        }
        
        $stmt = self::$conn->prepare($query);
        $stmt->execute($where);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public static function delete($table, $where, $limit = null) {
        $conditions = [];
        foreach ($where as $column => $value) {
            $conditions[] = "$column = :$column";
        }
        
        $query = "DELETE FROM $table WHERE " . implode(' AND ', $conditions);
        
        if ($limit !== null) {
            $query .= " LIMIT $limit";
        }
        
        try {
            $stmt = self::$conn->prepare($query);
            $stmt->execute($where);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Delete failed: ' . $e->getMessage();
        }
    }

    public static function DBQuery($query) {
        try {
            $stmt = self::$conn->query($query);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
    }

    public static function alert($status, $message = '') {
        return json_encode([
                    'status' => $status, 
                    'msg' => $message
                ]);
    }

    public static function resp($status, $message = '') {
        return json_encode([
                    'status' => $status, 
                    'msg' => $message
                ]);
    }
}