<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('ifElse', 3, function (callable $predicate, callable $onTrue, callable $onFalse): \Closure {
    return function (...$args) use ($predicate, $onTrue, $onFalse) {
        return $predicate(...$args)
            ? $onTrue(...$args)
            : $onFalse(...$args);
    };
});
