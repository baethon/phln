<?php

declare(strict_types=1);

namespace Baethon\Phln;

const pluck = 'Baethon\\Phln\\pluck';

/**
 * @param array<int|string, mixed> $list
 * @param string|int               $key
 *
 * @return array<mixed>
 */
function pluck(array $list, $key): array
{
    return map($list, _(prop, $key));
}
