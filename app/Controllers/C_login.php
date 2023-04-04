<?php
 
namespace App\Controllers;
 
use App\Models\M_User;
 
class C_Login extends BaseController
{
    protected $M_User;
    public function __construct()
    {
       $this->M_User = new M_User();
    }
    public function index()
    {
        return view('V_login');
    }
 
    public function process()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $where = ['username' => $username , 'password'=> $password];
        $dataUser = $this->M_User->GetUser($where);
        // dd($dataUser);
        if ($dataUser) {
           $datas=[
            'username' => $dataUser->username,
            'logged_in' => TRUE
           ];
            $session->set($datas);       
            return redirect()->to('/home');
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->to('/login');
            }
    }
    function logout()
    {
        $session = session();
        session()->destroy();
        return redirect()->to('/login');
    }
}