<?php
declare(strict_types=1);

namespace phln\collection;

const collapse = '\\phln\\collection\\collapse';

/**
 * Flattens array elements by one level
 *
 * @phlnSignature [[*], [*]] -> [*, *]
 * @phlnCategory collection
 * @param array $list
 * @return array
 */
function collapse(array $list): array
{
    return array_reduce($list, function ($carry, $item) {
        return is_array($item) ? array_merge($carry, $item) : append($item, $carry);
    }, []);
}
