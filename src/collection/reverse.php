<?php
declare(strict_types=1);

namespace phln\collection;

const reverse = '\\phln\\collection\\reverse';

/**
 * Returns a new list with the elements in reverse order.
 *
 * @phlnSignature [a] -> [a]
 * @phlnCategory collection
 * @param array $list
 * @return array
 * @see \array_reverse()
 * @example
 *      \phln\collection\reverse([1, 2, 3]); // [3, 2, 1]
 */
function reverse(array $list): array
{
    return array_reverse($list);
}
