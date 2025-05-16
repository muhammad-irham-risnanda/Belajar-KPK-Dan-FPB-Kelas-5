<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    public function searchUsers($keyword, $perPage, $offset)
    {
        return $this->like('username', $keyword)
                    ->findAll($perPage, $offset);
    }

    public function getUsers($perPage, $offset)
    {
        return $this->findAll($perPage, $offset);
    }

    public function countUsers()
    {
        return $this->countAllResults();
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}