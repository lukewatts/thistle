<?php
/**
 * ------------------------------------------------------------
 * Routes
 * ------------------------------------------------------------
 *
 * This where we define all of Thistle's routes
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */

$app->get('/', 'Thistle\Controller\Page::home')->bind('home');

$app->get('/version', function () use ($app) {
    return $app['version'];
});

$app->get('/controller-service-example', 'controller.page:home');
