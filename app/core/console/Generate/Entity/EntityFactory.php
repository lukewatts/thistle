<?php
namespace Thistle\App\Core\Console\Generate\Entity;

use Thistle\App\Core\Console\Generate\GenerateFactoryInterface;

/**
 * ------------------------------------------------------------
 * Class EntityFactory
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate\Entity
 */
class EntityFactory implements GenerateFactoryInterface
{
    /**
     * @var
     */
    protected $class_name;

    /**
     * @var
     */
    protected $table_name;

    /**
     * ------------------------------------------------------------
     * Generate
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return string
     */
    public function generate()
    {
        return sprintf(
            file_get_contents(__DIR__ . '/views/entity.txt'),
            $this->getTableName(),
            $this->getTableName(),
            $this->getClassName(),
            $this->getClassName(),
            $this->getClassName());
    }

    /**
     * ------------------------------------------------------------
     * Set Class Name
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $class_name
     */
    public function setClassName($class_name)
    {
        $this->class_name = $class_name;
    }

    /**
     * ------------------------------------------------------------
     * Get Class Name
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getClassName()
    {
        return $this->class_name;
    }

    /**
     * ------------------------------------------------------------
     * Set Table Name
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
     * Get Table Name
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