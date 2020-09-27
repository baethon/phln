<?php

declare(strict_types=1);

namespace Baethon\Phln;

const merge = 'Baethon\\Phln\\merge';

/**
 * @param object|array<mixed> $left
 * @param object|array<mixed> $right
 *
 * @return array<mixed>
 */
function merge($left, $right): array
{
    return array_merge(
        hashmap($left),
        hashmap($right)
    );
}
