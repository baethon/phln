<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\otherwise;
use function phln\fn\curryN;
use function phln\fn\throwException;
use function phln\type\typeCond;

const prepend = '\\phln\\collection\\prepend';
const 𝑓prepend = '\\phln\\collection\\𝑓prepend';

/**
 * Returns a new collection with the given element at the front, followed by the contents of the list or string.
 *
 * @phlnSignature a -> [a] -> [a]
 * @phlnSignature String -> String -> String
 * @phlnCategory collection
 * @param mixed $value
 * @param string|array $collection
 * @return \Closure|array
 * @example
 *      \phln\collection\prepend(3, [1, 2]); // [3, 1, 2]
 *      \phln\collection\prepend([3], [1, 2]); // [[3], 1, 2]
 *      \phln\collection\prepend('foo', 'bar'); // [[3], 1, 2]
 */
function prepend($value = null, $collection = null)
{
    return curryN(2, 𝑓prepend, func_get_args());
}

function 𝑓prepend($value, $collection)
{
    $arrayPrepend = function (array $copy) use ($value) {
        array_unshift($copy, $value);
        return $copy;
    };

    $f = typeCond([
        ['array', $arrayPrepend],
        ['string', curryN(3, '\\sprintf', ['%s%s', $value])],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($collection);
}
