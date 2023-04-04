<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Mahasiswa extends Model
{

    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM' ;
    protected $returnType = 'object' ;
    
    public function getMahasiswa()
    {
        $db= \Config\Database::connect();
        $query= $db->query("select * from mahasiswa");
        return $query->getResult();
    }
    public function saveMahasiswa($data){
       return $this->db->table('mahasiswa')->insert($data);
    }

    public function search($search)
    { 
        $query = $this->db->query("SELECT * FROM mahasiswa WHERE nama LIKE '%$search%'");
        return $query->getResult();
    }

    public function updateMahasiswa($data){
        $NIM = $data['NIM'];
        $Nama = $data['Nama'];
        $Umur = $data['Umur'];
        $db= \Config\Database::connect();
        $db->query("UPDATE mahasiswa SET Nama='$Nama', Umur='$Umur' WHERE NIM='$NIM'");
        
    }

    public function getMhs($NIM)
    {
        $query= $this->db->query("select * from mahasiswa where NIM = '$NIM'");
        return $query->getRow();
    }
}
