<?php

declare(strict_types=1);

namespace Baethon\Phln;

const merge = 'Baethon\\Phln\\merge';

/**
 * @param object|array<string, mixed> $left
 * @param object|array<string, mixed> $right
 * @return array<string, mixed>
 */
function merge ($left, $right): array
{
    assert_object($left);
    assert_object($right);

    return array_merge((array) $left, (array) $right);
}
