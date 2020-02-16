<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('swap', function (callable $f): \Closure {
    return function ($second, $first, ...$tail) use ($f) {
        $arguments = array_merge([$first, $second], $tail);
        return $f(...$arguments);
    };
});
