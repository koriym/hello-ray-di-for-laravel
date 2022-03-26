<?php

namespace App\Http\Controllers;

use App\Attribute\Loggable;
use App\Domain\Double\DoubleInterface;
use App\Http\Requests\GetHelloRequest;
use Illuminate\Contracts\View\View;
use Ray\Di\Di\Inject;
use Ray\Di\Di\PostConstruct;
use Ray\Di\Di\Set;
use Ray\Di\ProviderInterface;
use Ray\RayDiForLaravel\Attribute\Injectable;

#[Injectable]
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
        // Inject lazy dependency
        $this->doubleProvider = $provider;
    }

    #[PostConstruct]
    public function init()
    {
        // Initialize method after all dependencies injected
        $double1 = $this->doubleProvider->get();
        assert($double1 instanceof DoubleInterface);
    }

    #[Loggable] // AOP
    public function index(GetHelloRequest $request): View
    {
        $i = (int) ($request->validated()['i'] ?? 1);
        return view('hello', [
            'i' => $i,
            'doubled' => $this->double->double($i)
        ]);
    }
}
