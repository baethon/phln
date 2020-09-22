<?php

declare(strict_types=1);

namespace Baethon\Phln;

const mean = 'Baethon\\Phln\\mean';

/**
 * @param array<numeric> $numbers
 */
function mean(array $numbers): float
{
    return array_sum($numbers) / count($numbers);
}
