<?php
namespace Thistle\App\Core\Console\Generate\Controller;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\GenerateInterface;
use Thistle\App\Core\Console\Generate\Generator;

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
class Controller extends Generator implements GenerateInterface
{
    /**
     * @var
     */
    protected $controller;

    /**
     * @var
     */
    protected $method;

    /**
     * ------------------------------------------------------------
     * Constructor
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param $controller
     * @param $method
     */
    public function __construct($controller, $method)
    {
        parent::__construct('controllers', $controller, __CLASS__);

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
     *
     * @return void
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
                ], $fs);
            } catch(IOException $e) {
                // Catch error and display them.
                echo $e->getMessage();
            }

        }
    }

    /**
     * ------------------------------------------------------------
     * Set Controller
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * ------------------------------------------------------------
     * Get Controller
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * ------------------------------------------------------------
     * Set Method
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * ------------------------------------------------------------
     * Get Method
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }
}
