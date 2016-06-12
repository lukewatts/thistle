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