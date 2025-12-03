<?php
require_once __DIR__ . "/../config/config.php";

class Tiket
{
    private $conn;
    private $table = "tiket";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT t.*, k.nama_konser 
                  FROM tiket t
                  LEFT JOIN konser k ON t.konser_id = k.konser_id
                  ORDER BY t.tiket_id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM tiket WHERE tiket_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($konser_id, $kategori, $harga)
    {
        $query = "INSERT INTO tiket (konser_id, kategori, harga) 
                  VALUES (:konser_id, :kategori, :harga)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":konser_id", $konser_id);
        $stmt->bindParam(":kategori", $kategori);
        $stmt->bindParam(":harga", $harga);

        return $stmt->execute();
    }

    public function update($id, $konser_id, $kategori, $harga)
    {
        $query = "UPDATE tiket 
                  SET konser_id = :konser_id,
                      kategori = :kategori,
                      harga = :harga
                  WHERE tiket_id = :id";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":konser_id", $konser_id);
        $stmt->bindParam(":kategori", $kategori);
        $stmt->bindParam(":harga", $harga);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM tiket WHERE tiket_id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function getByKonser($konserId)
    {
        $query = "SELECT t.*, k.nama_konser, k.lokasi, k.tanggal
                FROM tiket t
                LEFT JOIN konser k ON t.konser_id = k.konser_id
                WHERE t.konser_id = :konserId
                ORDER BY t.harga ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":konserId", $konserId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}