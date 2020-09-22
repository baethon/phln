<?php

declare(strict_types=1);

namespace Baethon\Phln;

const collapse = 'Baethon\\Phln\\collapse';

/**
 * @param array<mixed> $collection
 *
 * @return array<mixed>
 */
function collapse(array $collection): array
{
    return reduce(
        $collection,
        function ($carry, $item) {
            return is_array($item)
                ? array_merge($carry, $item)
                : append($carry, $item);
        },
        []
    );
}
