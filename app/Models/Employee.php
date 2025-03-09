<?php

namespace App\Models;

use CodeIgniter\Model;

class Employee extends Model
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
}

?>