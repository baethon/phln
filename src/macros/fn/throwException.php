<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('throwException', function (string $exception, array $args): \Closure {
    return function () use ($exception, $args) {
        throw new $exception(...$args);
    };
});
