<?php
namespace Thistle\App\Core\Console\Generate\View;

use Thistle\App\Core\Console\Generate\GenerateFactoryInterface;

/**
 * ------------------------------------------------------------
 * Class ViewFactory
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate\View
 */
class ViewFactory implements GenerateFactoryInterface
{
    /**
     * @var
     */
    protected $view;

    /**
     * ------------------------------------------------------------
     * Generate
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.8
     *
     * @return string
     */
    public function generate()
    {
        return sprintf(file_get_contents(__DIR__ . '/views/view.txt'),
            ucfirst($this->getView())
        );
    }

    /**
     * ------------------------------------------------------------
     * Set View
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.8
     *
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * ------------------------------------------------------------
     * Get View
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.8
     *
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }
}