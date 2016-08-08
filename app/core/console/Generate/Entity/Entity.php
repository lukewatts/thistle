<?php
namespace Thistle\App\Core\Console\Generate\Entity;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\GenerateInterface;

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
class Entity extends EntityFactory implements GenerateInterface
{
    /**
     * ------------------------------------------------------------
     * Constructor
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param $class_name
     * @param $table_name
     */
    public function __construct($entity_name, $table_name)
    {
        $this->setEntityName($entity_name);
        $this->setTableName($table_name);
        $this->setClassName(__CLASS__);
        $this->setOutfile($entity_name);
        $this->setPath('entities');
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
     *
     * @return void
     */
    public function save(Filesystem $fs)
    {
        if ($fs->exists(sprintf('%s/%s.php', $this->getPath(), $this->getEntityName()))) {
            // 'A file with that name already exists in the Entity folder
            throw new \Exception(sprintf('A file with the name %s.php already exists in the entity folder', $this->getEntityName()));
        } else {
            // Try create file with contents
            try {
                $this->generate([
                    $this->getTableName(),
                    $this->getEntityName()
                ]);
            } catch(IOException $e) {
                echo $e->getMessage();
            }
            // Catch error and display them.
        }
    }
}
