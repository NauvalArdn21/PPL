<?php

namespace App\Controllers;

class C_info extends BaseController
{
      public function index()
    {
        if(! session()->get('logged_in')){
            return redirect()->to('/login');
        }
        $session = session();
        $username = $session->get('username');
        return view('info', compact('username'));
    }
}
?>