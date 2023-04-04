<?php

namespace App\Controllers;
use App\Models\M_Toko;
use App\Models\M_item_transaksi;
use App\Models\M_transaksi;
use App\Controllers\BaseController;

class C_Toko extends BaseController
{
    protected $M_Toko;
    protected $M_transaksi;
    protected $M_item_transaksi;
    public function __construct()
    {
       $this->toko = new M_Toko();
       $this->M_transaksi = new M_transaksi();
       $this->M_item_transaksi = new M_item_transaksi();
    }

    public function index()
    { 
        $toko = $this->toko->getToko();
    
    return view('V_Toko', compact('toko'));
    
    }

    public function checkout(){
        $session = session();
        $dataCart =  $session->get('dataCart');
        return view('V_Checkout', compact('dataCart'));
    }

    public function storeCheckout(){
        $session = session();
        $dataCart =  $session->get('dataCart');
        if(!$dataCart){
            session()->setFlashdata('msg', 'dataCart kosong silahkan pilih item terlebih dahulu');
            return redirect()->to('/toko');
        }
        $rules = [
            'nama' => 'required|alpha_space',
            'no_hp' => 'required|numeric|max_length[13]|min_length[10]',
            'alamat' => 'required',
            'kode_pos' => 'required|numeric|max_length[5]|min_length[5]'
        ];
        $message = [   // Errors
            'nama' => [
                'required' => 'Nama harus diisi',
                'alpha_space' => 'Nama tidak boleh mengandung angka',
            ],
            'no_hp' => [
                'required' => 'No Telepon harus diisi',
                'numeric' => 'Harus diisi angka',
                'max_length' => 'Maximal digit adalah 13',
                'min_length' => 'Minimal digit adalah 10',
            ],
            'kode_pos' => [
                'required' => 'Kode Pos harus diisi',
                'numeric' => 'Harus diisi angka',
                'max_length' => 'kode post terdiri dari 5 digit',
                'min_length' => 'kode post terdiri dari 5 digit',
            ],
            'alamat' => [
                'required' => 'Silahkan isi alamat anda',
            ],
        ];

        if($this->validate($rules, $message)){
            $data['nama'] = $this->request->getPost('nama');
            $data['no_hp'] = $this->request->getPost('no_hp');
            $data['alamat'] = $this->request->getPost('alamat');
            $data['kode_pos'] = $this->request->getPost('kode_pos');
            $data['total'] = $this->sumSubTotal();
            $transaksi = $this->M_transaksi->saveData($data);
            $this->storeItem($transaksi);
            session()->setFlashdata('msg', 'Transaksi Berhasil');
            return redirect()->to('/toko');
        }else{
            $data['validation'] = $this->validator;
            $data['dataCart'] =  session()->get('dataCart');
            return view('V_Checkout', $data);
        }
    }

    private function storeItem($id_transaksi){
        // dd($id_transaksi);
        $session = session();
        $dataCart =  $session->get('dataCart');
        // dd($dataCart);
        foreach($dataCart as $c){
            $toko = $this->toko->getOne($c['kode']);
            if($toko->stok >= $c['stok']){
                $this->M_item_transaksi->saveData($c, $id_transaksi);
                $this->toko->kurangiStock($c['kode'], $toko->stok - $c['stok']);
            }
        }
        $session->destroy('dataCart');
    }
    private function sumSubTotal(){
        $session = session();
        $dataCart =  $session->get('dataCart');
        $total = 0;
        foreach($dataCart as $c){
            $total += $c['stok'] * $c['harga'];
        }
        return $total;
    }

}
    