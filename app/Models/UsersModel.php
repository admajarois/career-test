<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $setTimestamps = true;
    protected $allowedFields = ['id', 'name', 'email', 'profile_image', 'password', 'role_id', 'is_active', 'date_created'];

    public function getUsersbyId($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
