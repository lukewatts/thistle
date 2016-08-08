<?php
namespace Thistle\App\Core\Console\Generate\Entity;

use Thistle\App\Core\Console\Generate\GenerateFactoryInterface;
use Thistle\App\Core\Console\Generate\Generator;

/**
 * ------------------------------------------------------------
 * Class EntityFactory
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate\Entity
 */
class EntityFactory extends Generator implements GenerateFactoryInterface
{
    /**
     * @var
     */
    public $entity_name;

    /**
     * @var
     */
    public $table_name;

    /**
     * ------------------------------------------------------------
     * Set Entity Name
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $entity_name
     */
    public function setEntityName($entity_name)
    {
        $this->entity_name = $entity_name;
    }

    /**
     * ------------------------------------------------------------
     * Get Entity Name
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getEntityName()
    {
        return $this->entity_name;
    }

    /**
     * ------------------------------------------------------------
     * Set TableName
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $table_name
     */
    public function setTableName($table_name)
    {
        $this->table_name = $table_name;
    }

    /**
     * ------------------------------------------------------------
     * Get TableName
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getTableName()
    {
        return $this->table_name;
    }
}
