<?php
namespace Madd\Silex\Provider\Fractal;

use Silex\Application;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\KernelEvents;

class FractalRequestListener implements EventSubscriberInterface
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getApp()
    {
        return $this->app;
    }

    public function setApp(Application $app)
    {
        $this->app = $app;

        return $this;
    }

    public static function getSubscribedEvents()
    {
        return array(KernelEvents::REQUEST => array('onKernelRequest', 100));
    }

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
