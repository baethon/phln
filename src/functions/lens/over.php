<?php

declare(strict_types=1);

namespace Baethon\Phln;

use Baethon\Phln\Monad\Identity;

const over = 'Baethon\\Phln\\over';

/**
 * @param object|array<mixed> $targetData
 * @param callable(object|array<mixed>, callable): mixed $lens
 * @param callable(mixed): mixed $fn
 * @return object|array<mixed>
 */
function over ($targetData, callable $lens, callable $fn)
{
    return $lens(
        $targetData,
        function ($value) use ($fn) {
            return Identity::of($fn($value));
        }
    )->extract();
}
