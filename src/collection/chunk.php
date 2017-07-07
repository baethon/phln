<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\{
    __, nil, otherwise
};
use function phln\fn\{
    curryN, partial, throwException
};
use function phln\type\typeCond;

const chunk = '\\phln\\collection\\chunk';
const 𝑓chunk = '\\phln\\collection\\𝑓chunk';

/**
 * Chunks an array or string into arrays with `size` elements.
 * The last chunk may contain less than `size` elements.
 *
 * @phlnSignature Number -> [a] -> [[a]]
 * @phlnSignature Number -> String -> [String]
 * @phlnCategory collection
 * @param string|integer $size
 * @param string|array $collection
 * @return \Closure|array
 * @example
 *      \phln\collection\chunk(2, [1, 2, 3, 4]); // [[1, 2], [3, 4]]
 *      \phln\collection\chunk(2, 'hello'); // ['he', 'll', 'o']
 */
function chunk($size = nil, $collection = nil)
{
    return curryN(2, 𝑓chunk, [$size, $collection]);
}

function 𝑓chunk(int $size, $collection)
{
    $f = typeCond([
        ['array', partial('\\array_chunk', [__, $size])],
        ['string', partial('\\str_split', [__, $size])],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($collection);
}
