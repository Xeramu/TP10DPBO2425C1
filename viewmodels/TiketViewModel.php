<?php
require_once 'models/tiket.php';

class TiketViewModel
{
    private $tiket;

    public function __construct()
    {
        $this->tiket = new Tiket();
    }

    public function getAllTiket()
    {
        return $this->tiket->getAll();
    }

    public function getTiketById($id)
    {
        return $this->tiket->getById($id);
    }

    public function getTiketByKonser($konserId)
    {
        return $this->tiket->getByKonser($konserId);
    }

    public function addTiket($konserId, $kategori, $harga)
    {
        return $this->tiket->create($konserId, $kategori, $harga);
    }

    public function updateTiket($id, $konserId, $kategori, $harga)
    {
        return $this->tiket->update($id, $konserId, $kategori, $harga);
    }

    public function deleteTiket($id)
    {
        return $this->tiket->delete($id);
    }
}
