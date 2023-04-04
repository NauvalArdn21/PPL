<?php
namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{

    Public function GetUser($where){
        // dd($where);
        $username = $where['username'];
        $password = $where['password'];
        $user = $this->db->query("select * from admin where username = '$username' and password = '$password'  ");
        // dd($user);
        return $user->getrow();
    }
}