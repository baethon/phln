<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('pipe', function (array $fns): \Closure {
    if (0 === count($fns)) {
        throw new \UnderflowException('pipe requires at least one argument');
    }

    return function (...$args) use ($fns) {
        $head = $fns[0];
        $tail = array_slice($fns, 1);

        return array_reduce($tail, function ($carry, callable $fn) {
            return $fn($carry);
        }, $head(... $args));
    };
});
