<?php
namespace Thistle\App\Core\Console\Generate\Controller;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\GenerateInterface;

/**
 * ------------------------------------------------------------
 * Class Controller
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate\Controller
 */
class Controller extends ControllerFactory implements GenerateInterface
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
    public function __construct($controller, $method)
    {
        $this->setPath('controllers');
        $this->setClassName(__CLASS__);
        $this->setOutfile($controller);
        $this->setController($controller);
        $this->setMethod($method);
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
        if ($fs->exists(sprintf('%s/%s.php', $this->getPath(), $this->getController()))) {
            // 'A file with that name already exists in the Entity folder
            throw new \Exception(sprintf('A file with the name %s.php already exists in the controllers folder', $this->getController()));
        } else {
            // Try create file with contents
            try {
                $this->generate([
                    $this->getController(),
                    $this->getController(),
                    ucfirst($this->getMethod()),
                    $this->getMethod(),
                    $this->getMethod()
                ]);
            } catch(IOException $e) {
                echo $e->getMessage();
            }
            // Catch error and display them.
        }
    }
}
