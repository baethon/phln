<?php

declare(strict_types=1);

namespace Baethon\Phln;

const difference = 'Baethon\\Phln\\difference';

/**
 * @param array<mixed> $left
 * @param array<mixed> $right
 * @return array<mixed>
 */
function difference (array $left, array $right): array
{
    $diff = array_diff($left, $right);
    return values($diff);
}
