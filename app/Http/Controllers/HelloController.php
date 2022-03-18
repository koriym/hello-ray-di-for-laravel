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
        // Inject depedency
        private readonly DoubleInterface $double
    ){}

    #[Loggable]
    public function index()
    {
        return view('hello', [
            'i' => $this->double->double(1)
        ]);
    }
}
