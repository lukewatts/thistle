<?php
use Symfony\Component\HttpFoundation\Response;

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

$app->get('/', 'Thistle\App\Controller\Page::home')->bind('home');