<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model
{
    protected $table = 'identitas';
    protected $primaryKey = 'npm';
    protected $allowedFields = ['npm', 'nama', 'alamat', 'jk', 'tgl_lhr', 'email'];
    protected $returnType = 'array';
}
