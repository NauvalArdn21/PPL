<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Toko extends Model
{

    public function getToko()
    {
        $db= \Config\Database::connect();
        $query= $db->query("SELECT * FROM `barang`");
        return $query->getResult();
    }

    public function getOne($kode)
    {
        // dd($kode);
        $query = $this->db->query("SELECT * FROM barang WHERE kode='$kode'");  
        return $query->getRow();
    }

    public function kurangiStock($kode, $stok){
        return $this->db->query("UPDATE barang SET stok='$stok'WHERE kode='$kode'");
    }
}
