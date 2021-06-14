<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = "barang";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'harga', 'deskripsi', 'user_id', 'image', 'kondisi','kategori', 'lokasi','created_at'];

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM {$this->table} ");
        return $query->getResultArray();
    }

    public function getByUser() {
        $user_id = session()->get('user_id');
        $query = $this->db->query("SELECT * FROM {$this->table} WHERE user_id = '$user_id'");
        return $query->getResultArray();
    }

    public function getById($id) {
        $query = $this->db->query("SELECT * FROM {$this->table} WHERE id = '$id'");
        return $query->getRowArray();
    }

}
