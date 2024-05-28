<?php

namespace App\Models;
use CodeIgniter\Model;

class Vehiculo extends Model {
    
    protected $table = 'vehiculos';
    
    protected $primaryKey = 'id'; 
    
    protected $allowedFields = ['marca', 'modelo', 'año', 'color', 'precio', 'motor', 'img', 'descripcion', 'baja'];
    

    public function getVehiculos() {
        return $this->where('baja', 'NO')->findAll();
    }

}
