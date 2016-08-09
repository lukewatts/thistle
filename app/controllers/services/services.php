<?php
namespace Thistle\App\Controller\Service;

use Silex\Application;
use Thistle\App\Controller;

/**
 * ------------------------------------------------------------
 * Service Controllers
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.9
 */

// Bit of hacky way to stop IDE's from showing an error because $app is undefined.
if (!isset($app)) $app = new Application();

$app['controller.page'] = $app->share(function () use ($app) {
    return new Controller\Page();
});

