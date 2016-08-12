<?php
namespace Thistle\App\Core\Console\Generate;

trait RenderTrait
{
    /**
     * @var
     */
    public $class_name;

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