<?php

declare(strict_types=1);

namespace Baethon\Phln;

const join = 'Baethon\\Phln\\join';

/**
 * @param array<mixed> $collection
 */
function join(array $collection, string $glue): string
{
    return \join($glue, $collection);
}
