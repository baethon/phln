<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('negate', function (callable $predicate): \Closure {
    return function (...$args) use ($predicate) {
        return !$predicate(...$args);
    };
});
