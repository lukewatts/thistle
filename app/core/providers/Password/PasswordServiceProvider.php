<?php
namespace Thistle\Core\Provider\Password;

use Silex\ServiceProviderInterface;
use Silex\Application;
use Thistle\Core\Provider\Password\Password;

/**
 * ------------------------------------------------------------
 * Class PasswordServiceProvider
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.7
 *
 * @package Thistle\Core\Provider\Password
 */
class PasswordServiceProvider implements ServiceProviderInterface
{
    /**
     * ------------------------------------------------------------
     * Register
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['password'] = $app->share(function () use ($app) {
            return new Password;
        });

        $app['password.encryption'] = $app->share(function () use ($app) {
            return $app['password']->getEncryption();
        });

        $app['password.cost'] = $app->share(function () use ($app) {
            return $app['password']->getCost();
        });

        $app['password.tolerance'] = $app->share(function () use ($app) {
            return $app['password']->getTolerance();
        });
    }

    /**
     * ------------------------------------------------------------
     * Boot
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     */
    public function boot(Application $app)
    {
        if (isset($app['password.encryption'])) $app['password']->setEncryption($app['password.encryption']);
        if (isset($app['password.cost'])) $app['password']->setCost($app['password.cost']);
        if (isset($app['password.tolerance'])) $app['password']->setTolerance($app['password.tolerance']);
    }
}