<?php

declare(strict_types=1);

namespace Baethon\Phln;

const tail = 'Baethon\\Phln\\tail';

/**
 * @param array<mixed>|string $collection
 * @return array<mixed>|string
 */
function tail ($collection) {
    return slice($collection, 1, length($collection));
}
