<?php

declare(strict_types=1);

namespace Baethon\Phln;

const if_else = 'Baethon\\Phln\\if_else';

/**
 * @param callable(mixed...): bool $predicate
 * @param callable(mixed...): mixed $onTrue
 * @param callable(mixed...): mixed $onFalse
 * @return callable(mixed...): mixed
 */
function if_else (callable $predicate, callable $onTrue, callable $onFalse): callable
{
    return function (...$args) use ($predicate, $onTrue, $onFalse) {
        return $predicate(...$args)
            ? $onTrue(...$args)
            : $onFalse(...$args);
    };
}
