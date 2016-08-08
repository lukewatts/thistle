<?php
namespace Thistle\App\Core\Console\Generate\Controller;

use Thistle\App\Core\Console\Generate\GenerateFactoryInterface;
use Thistle\App\Core\Console\Generate\Generator;

/**
 * ------------------------------------------------------------
 * Class ControllerFactory
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate\Controller
 */
class ControllerFactory extends Generator implements GenerateFactoryInterface
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
