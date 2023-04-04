<?php

namespace App\Controllers;

use App\Models\M_Toko;
use App\Models\M_Keranjang;

class C_Keranjang extends BaseController
{
    protected $keranjang;
    protected $toko;
    public function __construct()
	{
        $this->toko = new M_Toko();
	}

    public function index()
    {
        $session = session();
        $dataCart = $session->get('dataCart');
        return view('V_Keranjang', compact('dataCart'));
    }

    public function savekeranjang(){

        $session = session();
        
        $toko = $this->toko->getOne($this->request->getPost('kode'));
        $dataCart = $session->get('dataCart');
        if($dataCart){
            $arr = array_search($this->request->getPost('kode'), array_column($dataCart,'kode'));
            if($arr !== false){
                $dataCart[$arr]['stok'] += 1;
                     $session->set('dataCart',$dataCart);
                     session()->setFlashdata('msg', 'berhasil menambahkan ke keranjang');
                     return redirect()->to('/toko');
            }
        }
        // $toko = $this->toko->getOne($this->request->getPost('kode'));
        // // dd($toko);
        $dataCart[] = ([
            'kode' => $this->request->getPost('kode'),
            'stok' => 1,
            'nama' => $toko->nama,
            'harga' => $toko->harga,
            'gambar' => $toko->gambar
         ]);
         $session->set('dataCart',$dataCart);
         session()->setFlashdata('msg', 'berhasil menambahkan ke keranjang');
         return redirect()->to('/toko');
        // $dataCart = ([
        //     'kode' => $this->request->getPost('kode'),
        //     'stok' => 1,
        //     'harga' => $toko->harga,
        //     'foto' => $toko->gambar
        //   ]);
        //   $this->keranjang->setDatabase($dataCart);
        // return redirect()->to('/toko')->with('success', 'Data Berhasil Ditambahkan ke Cart');
    }
    public function delete($index)
    {
        // Retrieve the current cart items from the session
        $dataCart = session()->get('dataCart');

        // Loop through the cart items to find the item with the matching kode
        // foreach($dataCart as $index => $dataCart){
            // if($dataCart['kode'] == $kode){
                // Remove the item from the cart array
                // unset($dataCart[$index]);
                array_splice($dataCart, $index, 1);
                // dd($dataCart);
                // Save the updated cart array back to the session
                session()->set('dataCart', $dataCart);
                // Redirect back to the cart page
                return redirect()->to('/keranjang/list');
            // }
        // }

        // If the item was not found in the toko, redirect back to the toko page
        return redirect()->to('/keranjang/list');
    }




}
