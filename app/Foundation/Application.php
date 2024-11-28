<?php

namespace App\Foundation;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    public function withMiddleware(callable $callback)
    {
        $middleware = new class {
            public function alias(array $aliases)
            {
                $kernel = app(\App\Http\Kernel::class);
                foreach ($aliases as $alias => $class) {
                    $kernel->addRouteMiddleware($alias, $class);
                }
            }
        };

        $callback($middleware);
    }
}
