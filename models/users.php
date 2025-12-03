<?php
require_once __DIR__ . "/../config/config.php";

class Users
{
    private $conn;
    private $table = "users";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM users ORDER BY user_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $email)
    {
        $query = "INSERT INTO users (nama, email) VALUES (:nama, :email)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    }

    public function update($id, $nama, $email)
    {
        $query = "UPDATE users 
                  SET nama = :nama, email = :email 
                  WHERE user_id = :id";

        $stmt = $this->conn->prepare($query);


        // Bind parameters
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);


        // Bind parameters
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}