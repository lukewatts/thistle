<?php
namespace Thistle\App\Core\Console\Generate;

use Symfony\Component\Filesystem\Filesystem;

/**
 * ------------------------------------------------------------
 * Interface GenerateInterface
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Generate
 */
interface GenerateInterface
{
    /**
     * ------------------------------------------------------------
     * Save
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param Filesystem $fs
     * @return mixed
     */
    public function save(Filesystem $fs);
}
