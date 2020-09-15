<?php

declare(strict_types=1);

namespace Baethon\Phln;

const zip = 'Baethon\\Phln\\zip';

/**
 * @param array<int, mixed> $left
 * @param array<int, mixed> $right
 * @return array<array{mixed, mixed}>
 */
function zip (array $left, array $right): array
{
    return array_map(
        function ($left, $right) {
            return [$left, $right];
        },
        $left,
        $right
    );
}
