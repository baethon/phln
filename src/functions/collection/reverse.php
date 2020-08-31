<?php

declare(strict_types=1);

namespace Baethon\Phln;

const reverse = 'Baethon\\Phln\\reverse';

function reverse($collection)
{
    if (is_array($collection)) {
        return array_reverse($collection);
    }

    if (is_stringable($collection)) {
        return strrev($collection);
    }

    throw new \InvalidArgumentException('Unsupported collection type');
}
