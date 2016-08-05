<?php

/**
 * ------------------------------------------------------------
 * View Function
 * ------------------------------------------------------------
 *
 * Abstraction of the twig render method for easier use in
 * routes or controllers
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 *
 * @param $view
 * @param array $params
 *
 * @return mixed
 */
function view($view, array $params = [])
{
    global $app;

    return $app['twig']->render(sprintf('%s.html.twig', $view), $params);
}

/**
 * @deprecated 0.0.6 in favour of Entities. Deprecated by Luke Watts
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 *
 * @param array $exclude
 * @return array
 */
function model_files_array($exclude = ['.', '..', 'BaseModel.php'])
{
    $model_files =  array_diff(scandir(dirname(dirname(__DIR__)) . '/models'), $exclude);

    $models = [];
    foreach ($model_files as $model_file) {
        $model = str_replace('.php', '', $model_file);
        $models[Doctrine\Common\Inflector\Inflector::tableize($model)] = sprintf('App\Model\%s', str_replace('.php', '', $model));
    }

    return $models;
}
