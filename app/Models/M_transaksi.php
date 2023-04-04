<?php

namespace App\Models;

use CodeIgniter\Model;

class M_transaksi extends Model
{
    public function getAll(){
        $query = $this->db->query("SELECT * FROM transaksi");
        return $query->getResult();
    }

    public function saveData($data){
        $no_hp = $data['no_hp'];
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $kode_pos = $data['kode_pos'];
        $total = $data['total'];
        $tanggal = date('YYYY-MM-DD');
        $this->db->query("INSERT INTO transaksi VALUES (NULL, '$nama', '$kode_pos', '$alamat','$no_hp','$total','$tanggal' )");
        return $this->db->insertID();
        // return $this->db->table('barang')->insert($data);
    }
}
