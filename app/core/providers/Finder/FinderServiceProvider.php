<?php
namespace Thistle\Core\Provider\Finder;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\Finder\Finder;

/**
 * ------------------------------------------------------------
 * Class FinderServiceProvider
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.9
 *
 * @package Thistle\Core\Provider\Finder
 */
class FinderServiceProvider implements ServiceProviderInterface
{
    /**
     * ------------------------------------------------------------
     * Register
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param Application $app
     */
    public function register(Application $app)
    {
        // finder factory configuration
        $app['finder'] = function () use ($app) {
            return new Finder();
        };
    }

    /**
     * ------------------------------------------------------------
     * Boot
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param Application $app
     */
    public function boot(Application $app)
    {
        //
    }
}
