<?php
namespace Thistle\App\Model;

/**
 * ------------------------------------------------------------
 * Class User
 * ------------------------------------------------------------
 *
 * @deprecated 0.0.6 in favour of Entities. Deprecated by Luke Watts
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
