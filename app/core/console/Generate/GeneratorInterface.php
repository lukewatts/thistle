<?php
namespace Thistle\App\Core\Console\Generate;

/**
 * ------------------------------------------------------------
 * Interface GeneratorInterface
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate
 */
interface GeneratorInterface
{
    /**
     * ------------------------------------------------------------
     * Render
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @return mixed
     */
    public function render(array $args);
}
