<?php
namespace App\Model;

/**
 * ------------------------------------------------------------
 * Class User
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.2
 * @package App\Model
 */
class User extends BaseModel
{
    /**
     * ------------------------------------------------------------
     * Class User
     * ------------------------------------------------------------
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     *
     * @return string
     */
    public function getTableName()
    {
        return 'users';
    }
}