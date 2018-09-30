<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('partialRight', function (callable $fn, array $args): \Closure {
    return function (...$innerArgs) use ($fn, $args) {
        return $fn(...array_merge($innerArgs, $args));
    };
});
