<?php

namespace App\Http\Controllers;

use App\Attribute\Loggable;
use App\Domain\Double\DoubleInterface;
use Ray\Di\Di\Inject;
use Ray\Di\Di\PostConstruct;
use Ray\Di\Di\Set;
use Ray\Di\ProviderInterface;

class HelloController extends Controller
{
    private ProviderInterface $doubleProvider;

    public function __construct(
        // Inject dependency
        private readonly DoubleInterface $double
    ){}

    #[Inject]
    public function setFooProvider(
        #[Set(DoubleInterface::class)] ProviderInterface $provider
    ) {
        // Inject dependency provider
        $this->doubleProvider = $provider;
    }

    #[PostConstruct]
    public function init()
    {
        // Test provider in initialize method
        $double1 = $this->doubleProvider->get();
        assert($double1 instanceof DoubleInterface);
    }

    #[Loggable]
    public function index()
    {
        return view('hello', [
            'i' => $this->double->double(1)
        ]);
    }
}
