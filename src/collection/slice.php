<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const slice = '\\phln\\collection\\slice';
const 𝑓slice = '\\phln\\collection\\𝑓slice';

/**
 * Extracts a slice of the array
 *
 * @phlnSignature Integer -> Integer -> [a] -> [a]
 * @phlnCategory collection
 * @param string $offset
 * @param string $length
 * @param string $list
 * @return \Closure|mixed
 * @see \array_slice
 * @example
 *      $takeTwo = \phln\collection\slice(0, 2);
 *      $takeTwo([1, 2, 3]); // [1, 2]
 */
function slice($offset = nil, $length = nil, $list = nil)
{
    return curry(𝑓slice, $offset, $length, $list);
}

function 𝑓slice(int $offset, int $length, array $list): array
{
    return array_slice($list, $offset, $length);
}
