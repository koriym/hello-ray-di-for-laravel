<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Ray\RayDiForLaravel\Attribute\Injectable;
use Symfony\Component\HttpFoundation\Response;

#[Injectable]
class HiMiddleware
{
    public function __construct(private readonly DatabaseManager $databaseManager)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $databaseName = $this->databaseManager->getDatabaseName();
        $response->setContent($response->getContent() . "<br> Hi $databaseName from a middleware.");

        return $response;
    }
}
