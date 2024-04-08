<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['page'] = "home";
        return view('layouts/header', $data)
        .view('home')
        .view('layouts/footer'); 
    }


    public function nosotros()
    {
        $data['page'] = "nosotros";
        return view('layouts/header', $data)
        .view('nosotros')
        .view('layouts/footer'); 
    }
    public function comercializacion()
    {
        $data['page'] = "comercializacion";
        return view('layouts/header', $data)
        .view('comercializacion')
        .view('layouts/footer'); 
    }
    public function contacto()
    {
        $data['page'] = "contacto";
        return view('layouts/header', $data)
        .view('contacto')
        .view('layouts/footer'); 
    }

}
