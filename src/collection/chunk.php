<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const chunk = '\\phln\\collection\\chunk';
const 𝑓chunk = '\\phln\\collection\\𝑓chunk';

/**
 * Chunks an array into arrays with `size` elements.
 * The last chunk may contain less than `size` elements.
 *
 * @phlnSignature Number -> [a] -> [[a]]
 * @phlnCategory collection
 * @param string $size
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      \phln\collection\chunk(2, [1, 2, 3, 4]); // [[1, 2], [3, 4]]
 */
function chunk($size = nil, $list = nil)
{
    return curry(𝑓chunk, $size, $list);
}

function 𝑓chunk(int $size, array $list): array
{
    return array_chunk($list, $size);
}
