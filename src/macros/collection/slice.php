<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\{
    __, otherwise
};
use function phln\fn\{
    curryN, partial, throwException
};
use function phln\type\typeCond;

const slice = '\\phln\\collection\\slice';
const 𝑓slice = '\\phln\\collection\\𝑓slice';

/**
 * Extracts a slice of the array or string
 *
 * @phlnSignature Integer -> Integer -> [a] -> [a]
 * @phlnSignature Integer -> Integer -> String -> String
 * @phlnCategory collection
 * @param integer $offset
 * @param integer $length
 * @param string|array $collection
 * @return \Closure|array|string
 * @see \array_slice()
 * @see \substr()
 * @example
 *      $takeTwo = \phln\collection\slice(0, 2);
 *      $takeTwo([1, 2, 3]); // [1, 2]
 */
function slice(int $offset = 0, int $length = 0, $collection = null)
{
    return curryN(3, 𝑓slice, func_get_args());
}

function 𝑓slice(int $offset, int $length, $collection)
{
    $f = typeCond([
        ['array', partial('\\array_slice', [__, $offset, $length])],
        ['string', partial('\\substr', [__, $offset, $length])],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($collection);
}
