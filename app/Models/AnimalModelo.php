<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimalModelo extends Model{
    protected $table = 'animales';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre', 'edad', 'foto', 'tipo', 'descripcion'];
}