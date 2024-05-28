<?php

namespace App\Models;
use CodeIgniter\Model;
 class Consulta extends Model {
        protected $table = 'consultas';
    
        protected $primaryKey = 'id'; 
    
        protected $allowedFields = ['nombre', 'tipo', 'email', 'mensaje']; //   

}

