<?php
namespace Thistle\App\Core\Console\Generate\Entity;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\GenerateInterface;
use Thistle\App\Core\Console\Generate\Generator;

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
class Entity extends Generator implements GenerateInterface
{
    use \Thistle\App\Core\Console\Generate\RenderTrait;

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
        parent::__construct('entities', $entity_name, __CLASS__);

        $this->setEntityName($entity_name);
        $this->setTableName($table_name);
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
                ], $fs);
            } catch(IOException $e) {
                // Catch error and display them.
                echo $e->getMessage();
            }

        }
    }

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
