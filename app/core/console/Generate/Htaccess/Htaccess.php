<?php
namespace Thistle\App\Core\Console\Generate\Htaccess;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\GenerateInterface;
use Thistle\App\Core\Console\Generate\Generator;

/**
 * ------------------------------------------------------------
 * Class Htaccess
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4>
 * @since 0.0.9
 *
 * @package Thistle\App\Core\Console\Generate\Htaccess
 */
class Htaccess extends Generator implements GenerateInterface
{
    /**
     * @var
     */
    public $rewrite_base;

    /**
     * ------------------------------------------------------------
     * Constructor
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param $rewrite_base
     */
    public function __construct($rewrite_base)
    {
        parent::__construct(Generator::IS_ROOT, '.htaccess', __CLASS__);
        $this->setRewriteBase($rewrite_base);
    }

    /**
     * ------------------------------------------------------------
     * Save
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param Filesystem $fs
     * @throws \Exception
     *
     * @return void
     */
    public function save(Filesystem $fs)
    {
        // Try create file with contents
        try {
            $fs->dumpFile($this->getDumpfile(), $this->render([
                $this->getRewriteBase()
            ]));

        } catch(IOException $e) {
            // Catch error and display them.
            echo $e->getMessage();
        }
    }

    /**
     * ------------------------------------------------------------
     * Set Rewrite Base
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param mixed $rewrite_base
     */
    public function setRewriteBase($rewrite_base)
    {
        $this->rewrite_base = $rewrite_base;
    }

    /**
     * ------------------------------------------------------------
     * Get Rewrite Base
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @return mixed
     */
    public function getRewriteBase()
    {
        return $this->rewrite_base;
    }
}
