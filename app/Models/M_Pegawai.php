<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pegawai extends Model
{

    public function getPegawai()
    {
        $db= \Config\Database::connect();
        $query= $db->query("SELECT * FROM `pegawai`");
        return $query->getResult();
    }
    public function savePegawai($data){
       return $this->db->table('pegawai')->insert($data);
    }

    public function search($search)
    { 
        $query = $this->db->query("SELECT * FROM pegawai WHERE Nama LIKE '%$search%'");
        return $query->getResult();
    }

    public function updatePegawai($data){
        $NIM = $data['NIM'];
        $Nama = $data['Nama'];
        $Umur = $data['Umur'];
        $db= \Config\Database::connect();
        $db->query("UPDATE pegawai SET Nama='$Nama', Umur='$Umur' WHERE NIM='$NIM'");
        
    }

    public function getMhs($NIM)
    {
        $query= $this->db->query("select * from pegawai where NIM = '$NIM'");
        return $query->getRow();
    }
}
