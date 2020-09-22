<?php

declare(strict_types=1);

namespace Baethon\Phln;

const median = 'Baethon\\Phln\\median';

/**
 * @param array<numeric> $numbers
 * @psalm-immutable
 */
function median(array $numbers): float
{
    \sort($numbers, SORT_NUMERIC);

    $middle = count($numbers) / 2;
    $even = (0 === $middle % 2);

    $offsets = $even ? [$middle - 1, 2] : [(int) floor($middle), 1];
    $slice = array_slice($numbers, ...$offsets);

    return mean($slice);
}
