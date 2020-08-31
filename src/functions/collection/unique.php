<?php

declare(strict_types=1);

namespace Baethon\Phln;

const unique = 'Baethon\\Phln\\unique';

/**
 * @param array $collection
 * @return array
 * @psalm-pure
 */
function unique (array $collection): array
{
    return array_unique($collection);
}
