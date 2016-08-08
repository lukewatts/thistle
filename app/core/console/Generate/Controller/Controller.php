<?php
namespace Thistle\App\Core\Console\Generate\Controller;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * ------------------------------------------------------------
 * Class Controller
 * ------------------------------------------------------------
 *
 * @package Thistle\App\Core\Console\Generate\Controller
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 */
class Controller extends ControllerFactory
{
    /**
     * @var
     */
    public $path;

    /**
     * @var
     */
    public $app_path;

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
                $fs->dumpFile(sprintf('%s/%s.php', $this->getPath(), $this->getController()), $this->generate());
            } catch(IOException $e) {
                echo $e->getMessage();
            }
            // Catch error and display them.
        }
    }

    /**
     * ------------------------------------------------------------
     * Set Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->setAppPath(dirname(dirname(dirname(dirname(__DIR__)))));
        $this->path = sprintf('%s/%s', $this->getAppPath(), $path);
    }

    /**
     * ------------------------------------------------------------
     * Get Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * ------------------------------------------------------------
     * Set App Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $app_path
     */
    public function setAppPath($app_path)
    {
        $this->app_path = $app_path;
    }

    /**
     * ------------------------------------------------------------
     * Get App Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getAppPath()
    {
        return $this->app_path;
    }
}