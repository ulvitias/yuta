<?php

namespace app\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = ['username', 'password'];

    public function upd($ne, $admon)
    {
        return $this->db->table($this->table)->update($ne, ['username' => $admon]);
    }
}
