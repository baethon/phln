<?php

declare(strict_types=1);

namespace Baethon\Phln;

const all_pass = 'Baethon\\Phln\\all_pass';

/**
 * @template T
 *
 * @param T                        $value
 * @param array<callable(T): bool> $predicates
 */
function all_pass($value, array $predicates): bool
{
    return reduce(
        $predicates,
        function ($carry, callable $fn) use ($value) {
            return !$carry
                ? $carry
                : $fn($value);
        },
        true
    );
}
