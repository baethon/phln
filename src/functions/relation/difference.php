<?php

declare(strict_types=1);

namespace Baethon\Phln;

const difference = 'Baethon\\Phln\\difference';

function difference (array $left, array $right): array
{
    $diff = array_diff($left, $right);
    return values($diff);
}
