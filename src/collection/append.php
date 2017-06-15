<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\nil;
use function phln\fn\curryN;

const append = '\\phln\\collection\\append';
const 𝑓append = '\\phln\\collection\\𝑓append';

/**
 * Returns a new list containing the contents of the given list, followed by the given element.
 *
 * @phlnSignature a -> [a] -> [a]
 * @phlnCategory collection
 * @param string $value
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      \phln\collection\append(3, [1, 2]); // [1, 2, 3]
 *      \phln\collection\append([3], [1, 2]); // [1, 2, [3]]
 */
function append($value = nil, $list = nil)
{
    return curryN(2, 𝑓append, [$value, $list]);
}

function 𝑓append($value, array $list): array
{
    array_push($list, $value);
    return $list;
}
