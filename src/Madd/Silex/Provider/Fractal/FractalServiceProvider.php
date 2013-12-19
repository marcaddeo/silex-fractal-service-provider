<?php
namespace Madd\Silex\Provider\Fracatal;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Service provider for Silex
 */
class FractalServiceProvider implements ServiceProviderInterface
{

    /**
     * Register Service Provider
     * @param Application $app Silex application instance
     */
    public function register(Application $app)
    {
        /**
         * Set up our shared instance of the Fractal Manager
         */
        $app['fractal'] = $app->share(function () {
            return new Fractal\Manager;
        });

        /**
         * We need to add a request listener for Fractal to set its embeds.
         * We can't do that here, as the request has yet to be instantiated.
         */
        $app['fractal.request_listener'] = $app->share(function () use ($app) {
            return new FractalRequestListener($app);
        });
    }


    /**
     * Boot Method
     * @param Aplication $app Silex application instance
     * @codeCoverageIgnore
     */
    public function boot(Application $app)
    {
        /**
         * Subscribe our request listener
         */
        $app['dispatcher']->addSubscriber($app['fractal.request_listener']);
    }
}
