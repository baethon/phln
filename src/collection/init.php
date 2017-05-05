<?php
declare(strict_types=1);

namespace phln\collection;

const init = '\\phln\\collection\\init';

/**
 * Returns all but the last element of the given list.
 *
 * @phlnSignature [a] -> [a]
 * @phlnCategory collection
 * @param array $list
 * @return array
 * @example
 *      \phln\collection\init([1, 2, 3]); // [1, 2]
 *      \phln\collection\init([1, 2]); // [1]
 *      \phln\collection\init([1]); // []
 *      \phln\collection\init([]); // []
 */
function init(array $list): array
{
    return array_slice($list, 0, -1);
}
