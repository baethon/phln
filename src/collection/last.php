<?php
declare(strict_types=1);

namespace phln\collection;

const last = '\\phln\\collection\\last';

/**
 * Returns the last element of the given list.
 *
 * @phlnSignature [a] -> a
 * @phlnCategory collection
 * @param array $list
 * @return mixed|null
 * @example
 *      \phln\collection\last([1, 2, 3]); // 3
 *      \phln\collection\last([]); // null
 */
function last(array $list)
{
    $last = current(array_slice($list, -1));
    return (false === $last) ? null : $last;
}
