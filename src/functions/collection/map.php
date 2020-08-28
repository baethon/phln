<?php

declare(strict_types=1);

namespace Baethon\Phln;

const map = 'Baethon\\Phln\\map';

/**
 * @template T
 * @param T $collection
 * @param callable(mixed):mixed $fn
 * @return T
 */
function map ($collection, callable $fn)
{
    assert(is_array($collection) || Duck::isFunctor($collection));

    return is_array($collection)
        ? array_map($fn, $collection)
        : $collection->map($fn);
}
