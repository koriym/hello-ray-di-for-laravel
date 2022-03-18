<?php

namespace App;

use Closure;
use Illuminate\Container\Container;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;
use Illuminate\Routing\Matching\HostValidator;
use Illuminate\Routing\Matching\MethodValidator;
use Illuminate\Routing\Matching\SchemeValidator;
use Illuminate\Routing\Matching\UriValidator;
use Illuminate\Routing\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;
use Laravel\SerializableClosure\SerializableClosure;
use LogicException;
use Ray\Di\Exception\Unbound;
use Ray\Di\Injector;
use Ray\Di\InjectorInterface;
use ReflectionFunction;
use Symfony\Component\Routing\Route as SymfonyRoute;

class RayRoute extends Route
{
    /** @var InjectorInterface  */
    private $injector;

    public function __construct($methods, $uri, $action, InjectorInterface $injector)
    {
        parent::__construct($methods, $uri, $action);
        $this->injector = $injector;
    }

    /**
     * {@inheritDoc}
     */
    public function getController()
    {
        if (! $this->controller) {
            $class = $this->getControllerClass();
            try {
                $this->controller = $this->injector->getInstance($class);
            } catch (Unbound $e) {
                $this->controller = $this->container->make(ltrim($class, '\\'));
            }
        }

        return $this->controller;
    }
}
