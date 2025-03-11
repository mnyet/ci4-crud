<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email',
        'password'
    ];

    public function createNewUser($data)
    {
        return $this->insert($data);
    }

    public function findUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
?>