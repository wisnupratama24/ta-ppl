<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'password', 'email', 'tlp', 'role_id', 'reset_password', 'created_at'];

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
}
