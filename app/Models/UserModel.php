<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'password', 'email', 'tlp', 'role_id', 'is_active', 'created_at'];

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM {$this->table} ");
        return $query->getResultArray();
    }
    public function getCountActivation($hash)
    {
        $query = $this->db->query("SELECT COUNT(*) as total, id, nama, is_active FROM user WHERE md5(md5(CONCAT(nama, '-', email, '-', password))) = '$hash'")->getRowArray();

        return $query;
    }

    public function getByEmail($email)
    {
        $query = $this->db->query("SELECT COUNT(*) as total, password, nama, email, role_id, id FROM user WHERE email = '$email'");

        return $query->getRowArray();
    }
}
