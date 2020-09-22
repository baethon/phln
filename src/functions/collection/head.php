<?php

declare(strict_types=1);

namespace Baethon\Phln;

const head = 'Baethon\\Phln\\head';

/**
 * @param mixed $collection
 *
 * @return mixed|null
 * @psalm-immutable
 */
function head($collection)
{
    if (is_array($collection)) {
        /* @var array $collection */
        return ([] === $collection)
            ? null
            : $collection[0];
    }

    if (is_stringable($collection)) {
        $string = "{$collection}";

        return ('' === $string)
            ? ''
            : substr($string, 0, 1);
    }

    throw new \InvalidArgumentException('Unsupported collection type');
}
