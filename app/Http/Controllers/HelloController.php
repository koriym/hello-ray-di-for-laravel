<?php

namespace App\Http\Controllers;

use App\Domain\Double\DoubleInterface;

class HelloController extends Controller
{
    public function __construct(
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
