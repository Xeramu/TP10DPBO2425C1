<?php
require_once "config/config.php";

class Pemesanan
{
    private $conn;
    private $table = "pemesanan";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "
            SELECT p.*, 
                   u.nama AS nama_user,
                   t.kategori AS kategori_tiket,
                   t.harga AS harga_tiket,
                   k.nama_konser,
                   (p.jumlah * t.harga) AS total_harga
            FROM pemesanan p
            LEFT JOIN users u ON p.user_id = u.user_id
            LEFT JOIN tiket t ON p.tiket_id = t.tiket_id
            LEFT JOIN konser k ON t.konser_id = k.konser_id
            ORDER BY p.pesanan_id ASC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "
            SELECT p.*, 
                   u.nama AS nama_user,
                   t.kategori AS kategori_tiket,
                   t.harga AS harga_tiket,
                   k.nama_konser,
                   (p.jumlah * t.harga) AS total_harga
            FROM pemesanan p
            LEFT JOIN users u ON p.user_id = u.user_id
            LEFT JOIN tiket t ON p.tiket_id = t.tiket_id
            LEFT JOIN konser k ON t.konser_id = k.konser_id
            WHERE p.pesanan_id = :id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($user_id, $tiket_id, $jumlah)
    {
        $query = "INSERT INTO pemesanan (user_id, tiket_id, jumlah) 
                  VALUES (:user_id, :tiket_id, :jumlah)";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":tiket_id", $tiket_id);
        $stmt->bindParam(":jumlah", $jumlah);

        return $stmt->execute();
    }

    public function update($id, $user_id, $tiket_id, $jumlah)
    {
        $query = "UPDATE pemesanan 
                  SET user_id = :user_id,
                      tiket_id = :tiket_id,
                      jumlah = :jumlah
                  WHERE pesanan_id = :id";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":tiket_id", $tiket_id);
        $stmt->bindParam(":jumlah", $jumlah);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM pemesanan WHERE pesanan_id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}