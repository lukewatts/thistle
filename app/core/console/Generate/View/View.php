<?php
namespace Thistle\App\Core\Console\Generate\View;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\GenerateInterface;
use Thistle\App\Core\Console\Generate\Generator;

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
class View extends Generator implements GenerateInterface
{
    /**
     * ------------------------------------------------------------
     * Constructor
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.8
     *
     * @param $outfile
     */
    public function __construct($outfile)
    {
        parent::__construct('views', $outfile, __CLASS__);
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
     *
     * @return void
     */
    public function save(Filesystem $fs)
    {
        if ($fs->exists(sprintf('%s/%s.html.twig', $this->getPath(), $this->getOutfile()))) {
            // 'A file with that name already exists in the views folder
            throw new \Exception(sprintf('A file with the name %s.html.twig already exists in the %s folder', $this->getOutfile(), $this->getPath()));
        } else {
            // Try create file with contents
            try {
                $this->generate([ucfirst($this->getOutfile())], $fs);
            } catch(IOException $e) {
                // Catch error and display them.
                echo $e->getMessage();
            }
        }
    }
}
