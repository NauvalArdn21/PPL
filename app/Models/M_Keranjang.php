<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Keranjang extends Model
{
    protected $table   = 'keranjang';
    protected $allowedFields = [
        'id',
        'kode',
        'stok',
        'harga',
        'foto'
    ];
    public function getDatabase()
    {
        $query = $this->db->query("SELECT * FROM keranjang");
        return $query->getResult();
    }

    public function setDatabase($dataCart)  
    {
        $kode = $dataCart['kode'];
        $stok = $dataCart['stok'];
        $harga = $dataCart['harga'];
        $foto = $dataCart['foto'];
        $db = \Config\Database::connect();
        $query = $db->query("INSERT INTO keranjang VALUES ('$kode','$stok','$harga','$foto',NULL)");
    }

    public function getAllJoinWBarang(){
        $query = $this->db->query("SELECT keranjang.*, barang.Nama as Nama FROM keranjang INNER JOIN barang ON barang.Kode=keranjang.kode");
        return $query->getResult();
    }
}
