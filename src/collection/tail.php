<?php
declare(strict_types=1);

namespace phln\collection;

const tail = '\\phln\\collection\\tail';

/**
 * Returns all but the first element of the given list
 *
 * @phlnSignature [a] -> [a]
 * @phlnCategory collection
 * @param array $list
 * @return array
 * @example
 *      \phln\collection\tail([1, 2, 3]); // [2, 3]
 *      \phln\collection\tail([1]); // []
 *      \phln\collection\tail([]); // []
 */
function tail(array $list): array
{
    return array_slice($list, 1);
}
