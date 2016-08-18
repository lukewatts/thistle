<?php
namespace Thistle\Core\Provider\Model;

use Silex\ServiceProviderInterface;
use Silex\Application;

class ModelServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        // 
    }

    public function boot(Application $app)
    {
        foreach ($app['models'] as $label => $class) {
            $app[$label] = $app->share(function($app) use ($class) {
                return new $class($app['db']); 
            });
        }
    }
}
