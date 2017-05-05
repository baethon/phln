<?php
declare(strict_types=1);

namespace phln\collection;

const head = '\\phln\\collection\\head';

/**
 * Returns the first element of a given list
 *
 * @phlnSignature [a] -> a | Null
 * @phlnCategory collection
 * @param array $list
 * @return mixed|null
 * @example
 *      \phln\collection\head([1, 2, 3]); // 1
 *      \phln\collection\head([]); // null
 */
function head(array $list)
{
    $first = current(array_slice($list, 0, 1));
    return (false === $first) ? null : $first;
}
