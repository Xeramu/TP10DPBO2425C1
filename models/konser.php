<?php
require_once __DIR__ . "/../config/config.php";

class Konser
{
    private $conn;
    private $table = "konser";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM konser ORDER BY tanggal ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM konser WHERE konser_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_konser, $lokasi, $tanggal)
    {
        $query = "INSERT INTO konser (nama_konser, lokasi, tanggal) 
                  VALUES (:nama_konser, :lokasi, :tanggal)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":nama_konser", $nama_konser);
        $stmt->bindParam(":lokasi", $lokasi);
        $stmt->bindParam(":tanggal", $tanggal);

        return $stmt->execute();
    }

    public function update($id, $nama_konser, $lokasi, $tanggal)
    {
        $query = "UPDATE konser SET 
                    nama_konser = :nama_konser,
                    lokasi = :lokasi,
                    tanggal = :tanggal
                  WHERE konser_id = :id";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama_konser", $nama_konser);
        $stmt->bindParam(":lokasi", $lokasi);
        $stmt->bindParam(":tanggal", $tanggal);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM konser WHERE konser_id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}