<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const join = '\\join';

/**
 * Returns a string made by inserting the separator between each element and concatenating all the elements into a single string.
 *
 * @phlnSignature String -> [a] -> String
 * @phlnCategory collection
 * @param string $separator
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      $spacer = \phln\collection\join(' ');
 *      $spacer([1, 2, 3]); // '1 2 3'
 */
function join($separator = nil, $list = nil)
{
    return curry(join, $separator, $list);
}
