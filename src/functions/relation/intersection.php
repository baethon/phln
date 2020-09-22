<?php

declare(strict_types=1);

namespace Baethon\Phln;

const intersection = 'Baethon\\Phln\\intersection';

function intersection (array $left, array $right): array
{
    $intersection = array_intersect($left, $right);
    return values($intersection);
}
