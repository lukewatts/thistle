<?php
namespace Thistle\App\Core\Console\Generate;

use Symfony\Component\Filesystem\Filesystem;

/**
 * ------------------------------------------------------------
 * Class Generator
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4>
 * @since 0.0.9
 *
 * @package Thistle\App\Core\Console\Generate
 */
class Generator implements GenerateFactoryInterface
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
     * @var
     */
    public $template;

    /**
     * @var
     */
    public $outfile;

    /**
     * @var
     */
    public $extension;

    /**
     * @var
     */
    public $class_name;

    /**
     * ------------------------------------------------------------
     * Generate
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param Filesystem $fs
     * @param array $args
     */
    public function generate(array $args)
    {
        $fs = new Filesystem();

        $fs->dumpFile(
            sprintf(
                '%s/%s.%s',
                $this->getPath(),
                $this->getOutfile(),
                $this->getExtension()
            ),
            $this->render($args)
        );
    }

    /**
     * ------------------------------------------------------------
     * Render
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @return string
     */
    public function render(array $args)
    {
        array_unshift($args, $this->template(__DIR__));
        return call_user_func_array('sprintf', $args);
    }

    /**
     * ------------------------------------------------------------
     * Template
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param $template
     * @return mixed
     */
    public function template($template)
    {
        $this->setTemplate($template);

        return file_get_contents($this->getTemplate());
    }

    /**
     * ------------------------------------------------------------
     * Set Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->setAppPath(dirname(dirname(dirname(__DIR__))));
        $this->path = sprintf('%s/%s', $this->getAppPath(), $path);
    }

    /**
     * ------------------------------------------------------------
     * Get Path
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
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
     * @since 0.0.9
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
     * @since 0.0.9
     *
     * @return mixed
     */
    public function getAppPath()
    {
        return $this->app_path;
    }

    /**
     * ------------------------------------------------------------
     * Set Template
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $path = str_replace('\\', '/', $template);
        $parts = explode('/', $path);

        $this->template = sprintf('%s/%s/views/%s.txt', $path, $this->getClassName(), $this->getClassName());
    }

    /**
     * ------------------------------------------------------------
     * Get Template
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * ------------------------------------------------------------
     * Set Outfile
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param mixed $outfile
     */
    public function setOutfile($outfile)
    {
        $this->outfile = $outfile;
    }

    /**
     * ------------------------------------------------------------
     * Get Outfile
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @return mixed
     */
    public function getOutfile()
    {
        return $this->outfile;
    }

    /**
     * ------------------------------------------------------------
     * Set Extension
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param mixed $extension
     */
    public function setExtension($extension)
    {


        $this->extension = $extension;
    }

    /**
     * ------------------------------------------------------------
     * Get Extension
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @return mixed
     */
    public function getExtension()
    {
        if (is_null($this->extension)) {
            $path = str_replace('\\', '/', $this->getPath());
            $path = explode('/', $path);
            $extension = (end($path) == 'views') ? 'html.twig' : 'php';

            $this->setExtension($extension);
        }

        return $this->extension;
    }

    /**
     * ------------------------------------------------------------
     * Set Class Name
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @param mixed $class_name
     */
    public function setClassName($class_name)
    {
        $class_name = explode('\\', $class_name);
        $class_name = end($class_name);

        $this->class_name = $class_name;
    }

    /**
     * ------------------------------------------------------------
     * Get Class Name
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4>
     * @since 0.0.9
     *
     * @return mixed
     */
    public function getClassName()
    {
        return $this->class_name;
    }
}
