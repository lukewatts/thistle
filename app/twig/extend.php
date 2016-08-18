<?php

/**
 * ------------------------------------------------------------
 * Twig: Extend
 * ------------------------------------------------------------
 *
 * Extend Twig by adding functions, filters and globals
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.3
 */
$app['twig'] = $app->share($app->extend('twig', function ($twig) use ($app) {
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        // implement whatever logic you need to determine the asset path

        return sprintf('%s/%s/%s', rtrim($app['url']), $app['config']['assets_dir'], ltrim($asset, '/'));
    }));

    return $twig;
}));