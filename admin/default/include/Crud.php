<?php
require_once("Dbconfig.php");

class Crud 
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DbConnection();
        $this->conn = $dbConnection->getConnection();
    }

    public function create($data_array, $table)
    {
        $columns = implode(",", array_keys($data_array));
        $placeholders = ":" . implode(",:", array_keys($data_array));
        
        $sql = "INSERT INTO $table($columns) VALUES($placeholders) ON DUPLICATE KEY UPDATE updated_at = NOW()";

        $statement = $this->conn->prepare($sql);
        $statement->execute($data_array);

        return $this->conn->lastInsertId();
    }

    public function read($sql_query, $params = array())
    {
        $statement = $this->conn->prepare($sql_query);
        // Bind parameters
        foreach ($params as $param => $value) {
            $statement->bindValue($param, $value);
        }
        $statement->execute($params);
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($sql_query, $params = array()){
        try {
            $statement = $this->conn->prepare($sql_query);
            $result = $statement->execute($params);
            
            if ($result) {
                return true; // Query executed successfully
            } else {
                return false; // Query execution failed
            }
        } catch (PDOException $e) {
            // Handle the exception, log or display an error message
            echo "Error: " . $e->getMessage();
            return false; // Query execution failed due to an exception
        }
    }
    

    public function delete($sql_query, $params = array()){
        try {
            $statement = $this->conn->prepare($sql_query);
            $statement->execute($params);
            // You can also return the number of affected rows if needed:
            // return $statement->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            error_log("Database error: " . $e->getMessage());
            throw $e;
        }
    }
    
    
}