<?php

declare(strict_types=1);

namespace App\RayDi;

use Illuminate\Contracts\Container\BindingResolutionException;
use Ray\Di\ProviderInterface;
use RuntimeException;

abstract class AbstractIlluminateContainerProvider implements ProviderInterface
{
    protected abstract function getAbstract(): string;

    /**
     * @inheritDoc
     */
    public function get()
    {
        try {
            return app()->make($this->getAbstract());
        } catch (BindingResolutionException $e) {
            throw new RuntimeException(
                "failed to resolve abstract {$this->getAbstract()} by the illuminate container.", 0, $e
            );
        }
    }
}
