<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

const nth = '\\phln\\collection\\nth';
const 𝑓nth = '\\phln\\collection\\𝑓nth';

/**
 * Returns the nth element of the given list or string.
 * If n is negative the element at index length - n is returned.
 *
 * @phlnSignature Number -> [a] -> a | Null
 * @phlnCategory collection
 * @param string $n
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      \phln\collection\nth(1, [1, 2, 3]); // 2
 *      \phln\collection\nth(-1, [1, 2, 3]); // 3
 */
function nth($n = null, $list = null)
{
    return curryN(2, 𝑓nth, [$n, $list]);
}

function 𝑓nth(int $n, array $list)
{
    $index = $n < 0 ? count($list) + $n : $n;
    return isset($list[$index]) ? $list[$index] : null;
}
