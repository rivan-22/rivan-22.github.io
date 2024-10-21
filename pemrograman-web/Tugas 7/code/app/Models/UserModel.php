<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $allowedFields = ['username', 'pass', 'npm', 'level'];
    protected $returnType = 'array';
}
