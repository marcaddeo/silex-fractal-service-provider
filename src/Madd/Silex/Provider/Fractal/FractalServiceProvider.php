<?php
namespace Madd\Silex\Provider\Fractal;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Service provider to expose Fractal to Silex
 */
class FractalServiceProvider implements ServiceProviderInterface
{
    /**
     * Register Service Provider
     *
     * @param Silex\Application $app Silex application object
     */
    public function register(Application $app)
    {
        /**
         * Set up our shared instance of the Fractal Manager
         */
        $app['fractal'] = $app->share(function () {
            return new \League\Fractal\Manager;
        });

        /**
         * Set the default scope identifier
         */
        $app['fractal.scope_identifier'] = 'embed';

        /**
         * We need to add a request listener for Fractal to set its embeds.
         * We can't do that here, as the request has yet to be instantiated.
         */
        $app['fractal.request_listener'] = $app->share(function (Application $app) {
            return new FractalRequestListener($app);
        });
    }

    /**
     * Boot Method
     *
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
