<?php

namespace App\Controllers;
use App\Models\M_Pegawai;
use App\Controllers\BaseController;

class C_Pegawai extends BaseController
{
    protected $M_Pegawai;
    public function __construct()
    {
       $this->M_Pegawai = new M_Pegawai();
    }

    public function index()
    { 
     $data = $this->M_Pegawai->getPegawai();
    return view('V_Pegawai', compact('data'));
    
    }

    public function create()
    {    if(! session()->get('logged_in')){
            return redirect()->to('/login');
        }
        $session = session();
        $username = $session->get('username');
        return view('V_Create_Pegawai',compact('username'));
    }

    public function save()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'Nama' => 'required|min_length[3]|max_length[50]|alpha',
            'email' => 'required|valid_email',
            'no_telp' => 'required|min_length[11]|max_length[13]',
            'NIM' => 'required|min_length[9]|max_length[9]',
            'pendidikan' => 'required|min_length[3]',
            'Gender' => 'required|min_length[3]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('V_Create_Pegawai', [
                'validation' => $validation
            ]);
        } else {
            $data['Nama']= $this->request->getPost('Nama');
            $data['NIM']= $this->request->getPost('NIM');
            $data['email']= $this->request->getPost('email');
            $data['Gender']= $this->request->getPost('Gender');
            $data['no_telp']= $this->request->getPost('no_telp');
            $data['pendidikan']= $this->request->getPost('pendidikan');
            $this->M_Pegawai->savePegawai($data);
            return redirect()->to('/pegawai');
        }
       
  
        
       
    }
    public function delete($NIM){
        $this->M_Pegawai->delete($NIM);

        return redirect('/Pegawai')->with('success', 'Data Deleted Successfully');
    }

    public function detail($NIM){
        if(! session()->get('logged_in')){
            return redirect()->to('/login');
        }
        $session = session();
        $username = $session->get('username');
        $db= \Config\Database::connect();
        $query= $db->query("select * from Pegawai where NIM ='$NIM'");
        $row   = $query->getRow();
        return view('detail', compact('row','username'));
    }

    Public function edit($NIM)
    {
        $data = $this->M_Pegawai->getMhs($NIM);
        return view('V_Edit_Pegawai',compact('data'));
    }
    public function update(){
       
        $data=([
            'Nama' =>$this->request->getVar('Nama'),
            'NIM' =>$this->request->getVar('NIM'),
            'Umur' =>$this->request->getVar('Umur'),
        ]);
       
        $this->M_Pegawai->updatePegawai($data);
    
        return redirect()->to('/Pegawai');

    }

   
   
       
    
}   
