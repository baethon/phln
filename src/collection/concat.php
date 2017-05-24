<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const concat = '\\phln\\collection\\concat';
const 𝑓concat = '\\phln\\collection\\𝑓concat';

/**
 * Returns the result of concatenating the given arrays.
 *
 * @phlnSignature [a] -> [a] -> [a]
 * @phlnCategory collection
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @throws \InvalidArgumentException
 * @example
 *      \phln\collection\concat([1, 2], [3]); // [1, 2, 3]
 */
function concat($a = nil, $b = nil)
{
    return curry(𝑓concat, $a, $b);
}

function 𝑓concat(array $a, array $b): array
{
    return array_merge($a, $b);
}
