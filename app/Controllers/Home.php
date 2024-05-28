<?php

namespace App\Controllers;

use Config\App;

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

    public function catalogo()
    {
        $model = model('App\Models\Vehiculo');
        $data['page'] = "catalogo";
        $data['vehiculos'] = $model->getVehiculos();
        return view('layouts/header', $data)
        .view('catalogo')
        .view('layouts/footer'); 
    }

    public function consultas()
    {
        $data['page'] = "consultas";
        $data['usuario'] = model('App\Models\Usuario')->where(['usuario' => session()->get('user')])->first();
        return view('layouts/header', $data)
        .view('consultas')
        .view('layouts/footer'); 
    }
    public function terminos()
    {
        $data['page'] = "terminos";
        return view('layouts/header', $data)
        .view('terminos')
        .view('layouts/footer'); 
    }

    public function login()
    {
        $data['page'] = "login";
        return view('layouts/header', $data)
        .view('login')
        .view('layouts/footer');
    }


    public function registrarme()
    {
        $data['page'] = "registrarme";
        return view('layouts/header', $data)
        .view('registrarme')
        .view('layouts/footer');
    }

    public function carrito()
    {
        $data['page'] = "carrito";
        return view('layouts/header', $data)
        .view('carrito')
        .view('layouts/footer');
    }
    public function users()
    {
        $data['page'] = "admin";
        $data['users'] = model('App\Models\Usuario')->findAll();
        return view('layouts/header', $data)
        .view('admin/users')
        .view('layouts/footer');
    }

    public function vehiculosAdmin(){
        $data['page'] = "vehiculos";
        $data['vehiculos'] = model('App\Models\Vehiculo')->findAll();
        return view('layouts/header', $data)
        .view('admin/vehiculos')
        .view('layouts/footer');
    }

    public function newVehiculo() {	
        $data['page'] = "alta-vehiculo";
        $data['marcas'] = db_connect()->query("SELECT COLUMN_TYPE 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE TABLE_SCHEMA = 'bd_barrientos_franco' 
        AND TABLE_NAME = 'vehiculos' 
        AND COLUMN_NAME = 'marca'")->getResultArray();
        $data['marcas'] = $data['marcas'][0]['COLUMN_TYPE'];
        $data['marcas'] = explode(",",$data['marcas']);
        $data['marcas'][0] = str_replace("enum('","",$data['marcas'][0]);
        $data['marcas'][count($data['marcas'])-1] = str_replace("')","",$data['marcas'][count($data['marcas'])-1]);
        foreach ($data['marcas'] as &$item) {
            $item = str_replace("'", "", $item);
        }
        return view('layouts/header', $data)
        .view('admin/alta-vehiculo', $data)
        .view('layouts/footer');
    }

    public function editVehiculo($id) {	
        $data['page'] = "modificar-vehiculo";
        $data['marcas'] = db_connect()->query("SELECT COLUMN_TYPE 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE TABLE_SCHEMA = 'bd_barrientos_franco' 
        AND TABLE_NAME = 'vehiculos' 
        AND COLUMN_NAME = 'marca'")->getResultArray();
        $data['marcas'] = $data['marcas'][0]['COLUMN_TYPE'];
        $data['marcas'] = explode(",",$data['marcas']);
        $data['marcas'][0] = str_replace("enum('","",$data['marcas'][0]);
        $data['marcas'][count($data['marcas'])-1] = str_replace("')","",$data['marcas'][count($data['marcas'])-1]);
        foreach ($data['marcas'] as &$item) {
            $item = str_replace("'", "", $item);
        }
        $data['vehiculo'] = model('App\Models\Vehiculo')->find($id);
        #return var_dump($data['vehiculo']);
        return view('layouts/header', $data)
        .view('admin/edit-vehiculo')
        .view('layouts/footer');
    }

    public function consultasAdmin() {
        $data['page'] = "admin";
        $data['consultas'] = model('App\Models\Consulta')->findAll();
        return view('layouts/header', $data)
        .view('admin/consultas')
        .view('layouts/footer');
    }
}
