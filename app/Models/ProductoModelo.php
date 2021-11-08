<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModelo extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre', 'foto', 'precio', 'tipo', 'descripcion'];
}