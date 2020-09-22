<?php

declare(strict_types=1);

namespace Baethon\Phln;

const range = 'Baethon\\Phln\\range';

/**
 * @return array<int>
 */
function range(int $from, int $to): array
{
    if ($from === $to) {
        return [];
    }

    return ($from < $to) ? \range($from, $to - 1) : \range($from, $to + 1);
}
