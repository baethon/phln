<?php

declare(strict_types=1);

namespace Baethon\Phln;

const curry = 'Baethon\\Phln\\curry';

/**
 * @param array<mixed> $args
 *
 * @return CurriedFn|mixed
 */
function curry(callable $fn, array $args = [])
{
    return CurriedFn::of($fn)(...$args);
}
