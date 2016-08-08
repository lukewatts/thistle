<?php
namespace Thistle\App\Core\Console\Generate\View;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * ------------------------------------------------------------
 * Class View
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate\View
 */
class View extends ViewFactory
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
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.8
     *
     * @param $class_name
     * @param $table_name
     */
    public function __construct($view)
    {
        $this->setPath('views');
        $this->setView($view);
    }

    /**
     * ------------------------------------------------------------
     * Save
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.8
     *
     * @param Filesystem $fs
     * @throws \Exception
     */
    public function save(Filesystem $fs)
    {
        if ($fs->exists(sprintf('%s/%s.php', $this->getPath(), $this->getView()))) {
            // 'A file with that name already exists in the views folder
            throw new \Exception(sprintf('A file with the name %s.html.twig already exists in the views folder', $this->getView()));
        } else {
            // Try create file with contents
            try {
                $fs->dumpFile(sprintf('%s/%s.html.twig', $this->getPath(), $this->getView()), $this->generate());
            } catch(IOException $e) {
                // Catch error and display them.
                echo $e->getMessage();
            }
        }
    }

    /**
     * ------------------------------------------------------------
     * Set Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
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
     * @author Luke Watts <luke@affinity4>
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
     * @author Luke Watts <luke@affinity4>
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
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getAppPath()
    {
        return $this->app_path;
    }
}