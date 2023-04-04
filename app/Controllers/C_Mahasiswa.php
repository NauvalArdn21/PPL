<?php

namespace App\Controllers;
use App\Models\M_Mahasiswa;
use App\Controllers\BaseController;

class C_Mahasiswa extends BaseController
{
    protected $M_Mahasiswa;
    public function __construct()
    {
       $this->M_Mahasiswa = new M_Mahasiswa();
    }
    public function index()
    {
            if(! session()->get('logged_in')){
                return redirect()->to('/login');
            }
            $model = new M_Mahasiswa();
            $session = session();
            $username = $session->get('username');
            $search = $this->request->getGet('cari');
            if($search){
                $data = $this->M_Mahasiswa->search($search);
            }else{
        
                $data = $model->paginate(3, 'mahasiswa');
                // $datamhs ['mahasiswa'] = 
                $pager= $model->pager;
            }

    return view('mahasiswa', compact('data','username','pager'));
    }

    public function create()
    {    if(! session()->get('logged_in')){
            return redirect()->to('/login');
        }
        $session = session();
        $username = $session->get('username');
        return view('V_Create_Mahasiswa',compact('username'));
    }

    public function save()
    {
        $data['Nama']= $this->request->getPost('Nama');
        $data['NIM']= $this->request->getPost('NIM');
        $data['Umur']= $this->request->getPost('Umur');
        $this->M_Mahasiswa->saveMahasiswa($data);
        return redirect()->to('/mahasiswa');
    }
    public function delete($NIM){
        $this->M_Mahasiswa->delete($NIM);

        return redirect('/mahasiswa')->with('success', 'Data Deleted Successfully');
    }

    public function detail($NIM){
        if(! session()->get('logged_in')){
            return redirect()->to('/login');
        }
        $session = session();
        $username = $session->get('username');
        $db= \Config\Database::connect();
        $query= $db->query("select * from mahasiswa where NIM ='$NIM'");
        $row   = $query->getRow();
        return view('detail', compact('row','username'));
    }

    Public function edit($NIM)
    {
        $data = $this->M_Mahasiswa->getMhs($NIM);
        return view('V_Edit_Mahasiswa',compact('data'));
    }
    public function update(){
       
        $data=([
            'Nama' =>$this->request->getVar('Nama'),
            'NIM' =>$this->request->getVar('NIM'),
            'Umur' =>$this->request->getVar('Umur'),
        ]);
       
        $this->M_Mahasiswa->updateMahasiswa($data);
    
        return redirect()->to('/mahasiswa');

    }

   
   
       
    
}   
