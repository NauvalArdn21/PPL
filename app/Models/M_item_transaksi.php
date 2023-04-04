<?php

namespace App\Models;

use CodeIgniter\Model;

class M_item_transaksi extends Model
{
    // protected $table            = 'mahasiswa';
    // protected $primaryKey       = 'NIM';

    // protected $useAutoIncrement = false;

    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;

    // protected $allowedFields    = ['NIM', 'nama', 'umur'];

    public function getAll(){
        $query = $this->db->query("SELECT * FROM item_transaksi");
        return $query->getResult();
    }

    public function getOne($id){
        $query = $this->db->query("SELECT * FROM item_transaksi where id = '$id'");
        return $query->getRow();
    }

    public function getByKodeBarang($kode_barang){
        $query = $this->db->query("SELECT * FROM item_transaksi where kode_barang = '$kode_barang'");
        return $query->getRow();
    }

    public function getAllJoinBarang(){
        $query = $this->db->query("SELECT item_transaksi.*, barang.nama_barang as nama_barang FROM item_transaksi INNER JOIN barang ON barang.kode_barang=item_transaksi.kode_barang ");
        return $query->getResult();
    }

    public function saveData($data, $id_transaksi){
        $kode = $data['kode'];
        $kuantitas = $data['stok'];
        $harga = $data['harga'];
        return $this->db->query("INSERT INTO item_transaksi VALUES (NULL, '$kode','$harga' , '$kuantitas', '$id_transaksi')");
    }

    public function updateKuantitas($id, $kuantitas){
        return $this->db->query("UPDATE item_transaksi SET kuantitas='$kuantitas' WHERE id='$id'");
    }

    public function deleteData($id){
        return $this->db->query("DELETE FROM item_transaksi WHERE id = '$id' ");
    }

}
