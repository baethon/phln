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

const append = '\\phln\\collection\\append';
const 𝑓append = '\\phln\\collection\\𝑓append';

/**
 * Returns a new list containing the contents of the given list or string, followed by the given element.
 *
 * @phlnSignature a -> [a] -> [a]
 * @phlnSignature String -> String -> String
 * @phlnCategory collection
 * @param mixed $value
 * @param string|array $collection
 * @return \Closure|string|array
 * @example
 *      \phln\collection\append(3, [1, 2]); // [1, 2, 3]
 *      \phln\collection\append([3], [1, 2]); // [1, 2, [3]]
 *      \phln\collection\append('foo', 'bar'); // 'barfoo'
 */
function append($value = nil, $collection = nil)
{
    return curryN(2, 𝑓append, [$value, $collection]);
}

function 𝑓append($value, $collection)
{
    $pushToArray = function (array $copy) use ($value) {
        array_push($copy, $value);
        return $copy;
    };

    $f = typeCond([
        ['array', $pushToArray],
        ['string', partial('\\sprintf', ['%s%s', __, $value])],
        [otherwise, throwException(\InvalidArgumentException::class)]
    ]);

    return $f($collection);
}
