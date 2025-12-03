<?php
require_once 'models/pemesanan.php';

class PemesananViewModel
{
    private $pemesanan;

    public function __construct()
    {
        $this->pemesanan = new Pemesanan();
    }

    public function getAllPemesanan()
    {
        return $this->pemesanan->getAll();
    }

    public function getPemesananById($id)
    {
        return $this->pemesanan->getById($id);
    }

    public function addPemesanan($userId, $tiketId, $jumlah)
    {
        if ($jumlah <= 0) {
            return ["error" => "Jumlah tiket harus lebih dari 0"];
        }

        return $this->pemesanan->create($userId, $tiketId, $jumlah);
    }

    public function updatePemesanan($id, $userId, $tiketId, $jumlah)
    {
        if ($jumlah <= 0) {
            return ["error" => "Jumlah tiket harus lebih dari 0"];
        }

        return $this->pemesanan->update($id, $userId, $tiketId, $jumlah);
    }

    public function deletePemesanan($id)
    {
        return $this->pemesanan->delete($id);
    }
}
