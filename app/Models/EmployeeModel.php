<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'first_name',
        'last_name',
        'contact_num',
        'email',
        'employee_role'
    ];

    public function findAllEmployees() {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function findEmployeeById($id) {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->get()->getRowArray();
    }

    public function createEmployeeProced($data) {
        return $this->db->table($this->table)->insert($data);
    }
}

?>