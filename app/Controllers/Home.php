<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return ("Hello World");
    }

    public function Opal()
    {
        return view ('hello_world');
    }
}
