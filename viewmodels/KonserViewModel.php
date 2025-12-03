<?php
require_once 'models/konser.php';

class KonserViewModel
{
    private $konser;

    public function __construct()
    {
        $this->konser = new Konser();
    }

    public function getAllKonser()
    {
        return $this->konser->getAll();
    }

    public function getKonserById($id)
    {
        return $this->konser->getById($id);
    }

    public function addKonser($nama, $lokasi, $tanggal)
    {
        return $this->konser->create($nama, $lokasi, $tanggal);
    }

    public function updateKonser($id, $nama, $lokasi, $tanggal)
    {
        return $this->konser->update($id, $nama, $lokasi, $tanggal);
    }

    public function deleteKonser($id)
    {
        return $this->konser->delete($id);
    }
}