<?php

declare(strict_types=1);

namespace Baethon\Phln;

const intersection = 'Baethon\\Phln\\intersection';

/**
 * @param array<mixed> $left
 * @param array<mixed> $right
 *
 * @return array<mixed>
 */
function intersection(array $left, array $right): array
{
    $intersection = array_intersect($left, $right);

    return values($intersection);
}
