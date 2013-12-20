<?php
namespace Madd\Silex\Provider\Fractal;

use Silex\Application;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * A request listener for fractal to set the scopes.
 *
 * Since the Request object is not yet instantiated in the Service Provider,
 * we must set up and event listener to fire on the KernelEvents::REQUEST event
 * so that we can retrieve the scope variables and set them in the Fractal
 * Manager
 */
class FractalRequestListener implements EventSubscriberInterface
{
    /**
     * The Silex\Application object
     *
     * @var Silex\Application
     */
    protected $app;

    /**
     * Constructor method
     *
     * @param Silex\Application The application object
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Getter for app
     *
     * @return Silex\Application The application object
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Setter for app
     *
     * @param Silex\Application $app
     */
    public function setApp(Application $app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Set up our subscribed events
     *
     * @return array The list of events to subscribe to
     */
    public static function getSubscribedEvents()
    {
        return array(KernelEvents::REQUEST => array('onKernelRequest', 100));
    }

    /**
     * Handle Kenel Request Event
     *
     * Here we check if this is the initial master request, and if it does
     * we setup the scopes as passed by $_GET[fractal.scope_identifier]
     *
     * @param Symfony\Component\HttpKernel\Event\GetResponseEvent $event The Response Event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->getRequestType() === HttpKernel::MASTER_REQUEST) {
            $fractal = $this->app['fractal'];
            $request = $this->app['request'];
            $scope   = $this->app['fractal.scope_identifier'];

            $fractal->setRequestedScopes(explode(',', $request->get($scope)));
        }
    }
}
