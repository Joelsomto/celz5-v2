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

    /**
     * Insert or update a record in the database.
     *
     * @param array $data_array Associative array of column names and values.
     * @param string $table The name of the table.
     * @param array $update_fields Fields to update on duplicate key.
     * @return int Last inserted ID or affected rows.
     */
    public function create($data_array, $table, $update_fields = [])
    {
        // Prepare column names and placeholders for INSERT
        $columns = implode(",", array_keys($data_array));
        $placeholders = ":" . implode(",:", array_keys($data_array));

        // Prepare the ON DUPLICATE KEY UPDATE clause
        $update_sql = '';
        if (!empty($update_fields)) {
            $updates = [];
            foreach ($update_fields as $field) {
                $updates[] = "$field = VALUES($field)";
            }
            $update_sql = " ON DUPLICATE KEY UPDATE " . implode(", ", $updates);
        }

        // Final query
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders) $update_sql";

        // Prepare and execute statement
        $statement = $this->conn->prepare($sql);
        $statement->execute($data_array);

        return $this->conn->lastInsertId();
    }

    /**
     * Fetch records from the database.
     *
     * @param string $sql_query The SQL query.
     * @param array $params Associative array of parameters.
     * @return array Fetched records.
     */
    public function read($query, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
    
            // Bind parameters if they exist
            if (!empty($params)) {
                foreach ($params as $key => $value) {
                    // Bind integers as integers
                    if (is_int($value)) {
                        $stmt->bindValue(':' . $key, $value, PDO::PARAM_INT);
                    } else {
                        $stmt->bindValue(':' . $key, $value);
                    }
                }
            }
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            throw new PDOException("Database error: " . $e->getMessage());
        }
    }

    /**
     * Update records in the database.
     *
     * @param string $table The name of the table.
     * @param array $data Associative array of column names and values to update.
     * @param array $conditions Associative array of conditions.
     * @return bool True if successful, false otherwise.
     */
    public function update($table, $data, $conditions)
    {
        // Prepare SET clause
        $setClause = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($data)));

        // Prepare WHERE clause
        $whereClause = implode(" AND ", array_map(fn($key) => "$key = :$key", array_keys($conditions)));

        // Final query
        $sql = "UPDATE $table SET $setClause WHERE $whereClause";

        // Merge data and conditions for binding
        $params = array_merge($data, $conditions);

        // Prepare and execute statement
        $statement = $this->conn->prepare($sql);
        return $statement->execute($params);
    }

    /**
     * Delete records from the database.
     *
     * @param string $table The name of the table.
     * @param array $conditions Associative array of conditions.
     * @return bool True if successful, false otherwise.
     */
    public function delete($table, $conditions)
    {
        // Prepare WHERE clause
        $whereClause = implode(" AND ", array_map(fn($key) => "$key = :$key", array_keys($conditions)));

        // Final query
        $sql = "DELETE FROM $table WHERE $whereClause";

        // Prepare and execute statement
        $statement = $this->conn->prepare($sql);
        return $statement->execute($conditions);
    }
}