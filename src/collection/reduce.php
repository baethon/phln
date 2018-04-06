<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;
use const phln\fn\nil;

const reduce = '\\phln\\collection\\reduce';
const 𝑓reduce = '\\phln\\collection\\𝑓reduce';

/**
 * Returns a single item by iterating through the list, successively calling the iterator function and passing it an accumulator value and the current value from the array, and then passing the result to the next call.
 *
 * The iterator function receives two values: (`acc`, `value`).
 *
 * @phlnSignature ((a, b) -> a) -> a -> [b] -> a
 * @phlnCategory collection
 * @param callable $reducer
 * @param mixed $initialValue
 * @param array $list
 * @return \Closure|mixed
 * @example
 *      \phln\collection\reduce(\phln\math\subtract, 0, [1, 2, 3, 4]);
 *      // ((((0 - 1) - 2) - 3) - 4) => -10
 */
function reduce(callable $reducer = null, $initialValue = null, array $list = [])
{
    return curryN(3, 𝑓reduce, func_get_args());
}

function 𝑓reduce(callable $reducer, $initialValue, array $list)
{
    return array_reduce($list, $reducer, $initialValue);
}
