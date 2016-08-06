<?php
namespace Thistle\App\Core\Provider\DoctrineORM;

use Silex\ServiceProviderInterface;
use Silex\Application;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * ------------------------------------------------------------
 * Class DoctrineORMServiceProvider
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.7
 *
 * @package Thistle\App\Core\Provider\DoctrineORM
 */
class DoctrineORMServiceProvider implements ServiceProviderInterface
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
        $app['orm.isDevMode'] = $app->share(function () use ($app) {
            return false;
        });

        $app['orm.paths'] = $app->share(function () use ($app) {
            return [__DIR__ . '/app/entities'];
        });

        $app['orm.config'] = $app->share(function () use ($app) {
            return Setup::createAnnotationMetadataConfiguration($app['orm.paths'], $app['orm.isDevMode']);
        });

        $app['em'] = $app->share(function () use ($app) {
            return EntityManager::create($app['db.options'], $app['orm.config']);
        });
    }

    /**
     * ------------------------------------------------------------
     * Boot
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     *
     * @param Application $app
     */
    public function boot(Application $app)
    {
        //
    }
}
