<?php
declare(strict_types=1);

namespace phln\collection;

const unique = '\\phln\\collection\\unique';

/**
 * Returns a new list containing only one copy of each element in the original list. Strict comparision is used to determine equality.
 *
 * @phlnSignature [a] -> [a]
 * @phlnCategory collection
 * @param array $list
 * @return array
 * @example
 *      \phln\collection\unique([3, 2, 1, 1, 3, 2]); // [3, 2, 1]
 */
function unique(array $list): array
{
    $reducer = function ($carry, $item) {
        return in_array($item, $carry, true) ? $carry : append($item, $carry);
    };

    return array_reduce($list, $reducer, []);
}
