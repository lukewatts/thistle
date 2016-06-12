<?php
namespace App\Model;

class User extends BaseModel
{
    public function getTableName()
    {
        return 'users';
    }
}