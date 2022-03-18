<?php

declare(strict_types=1);

namespace App\Interceptor;
use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;
use function microtime;

final class LoggerInterceptor implements MethodInterceptor
{
    public function invoke(MethodInvocation $invocation)
    {
        $time = microtime(true);
        $result = $invocation->proceed();
        echo (sprintf('time: %s', (string) (microtime(true) - $time)));

        return $result;
    }
}
