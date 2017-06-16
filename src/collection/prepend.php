<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\nil;
use function phln\fn\curryN;

const prepend = '\\phln\\collection\\prepend';
const 𝑓prepend = '\\phln\\collection\\𝑓prepend';

/**
 * Returns a new list with the given element at the front, followed by the contents of the list.
 *
 * @phlnSignature a -> [a] -> [a]
 * @phlnCategory collection
 * @param string $value
 * @param string|array $list
 * @return \Closure|array
 * @example
 *      \phln\collection\prepend(3, [1, 2]); // [3, 1, 2]
 *      \phln\collection\prepend([3], [1, 2]); // [[3], 1, 2]
 */
function prepend($value = nil, $list = nil)
{
    return curryN(2, 𝑓prepend, [$value, $list]);
}

function 𝑓prepend($value, array $list): array
{
    array_unshift($list, $value);
    return $list;
}
