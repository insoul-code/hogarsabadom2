<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $allowedFields = ['name','email','password', 'rol'];
}
?>