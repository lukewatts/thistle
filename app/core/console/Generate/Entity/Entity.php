<?php
namespace Thistle\App\Core\Console\Generate\Entity;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * ------------------------------------------------------------
 * Class Entity
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate\Entity
 */
class Entity extends EntityFactory
{
    /**
     * @var
     */
    public $entities_path;

    /**
     * ------------------------------------------------------------
     * Constructor
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     *
     * @param $class_name
     * @param $table_name
     */
    public function __construct($class_name, $table_name)
    {
        $this->setClassName($class_name);
        $this->setTableName($table_name);
        $this->setEntitiesPath(dirname(dirname(dirname(dirname(__DIR__)))) . '/entities');
    }

    /**
     * ------------------------------------------------------------
     * Save
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param Filesystem $fs
     * @throws \Exception
     */
    public function save(Filesystem $fs)
    {
        if ($fs->exists($this->getClassName() . '.php')) {
            // 'A file with that name already exists in the Entity folder
            throw new \Exception(sprintf('A file with the name %s.php already exists in the entity folder', $this->getClassName()));
        } else {
            // Try create file with contents
            try {
                $fs->dumpFile(sprintf('%s/%s.php', $this->getEntitiesPath(), $this->getClassName()), $this->generate());
            } catch(IOException $e) {
                echo $e->getMessage();
            }
            // Catch error and display them.
        }
    }

    /**
     * ------------------------------------------------------------
     * Set Entities Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $entities_path
     */
    public function setEntitiesPath($entities_path)
    {
        $this->entities_path = $entities_path;
    }

    /**
     * ------------------------------------------------------------
     * Get Entities Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getEntitiesPath()
    {
        return $this->entities_path;
    }
}