<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('nAry', function (int $n, callable $fn): callable {
    return function (...$args) use ($n, $fn) {
        return $fn(...array_slice($args, 0, $n));
    };
});
