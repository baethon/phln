<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\{
    __, F, nil, otherwise, T
};
use function phln\fn\{
    curryN, partial
};
use function phln\logic\𝑓both as both;
use function phln\relation\equals;
use function phln\type\typeCond;

const contains = '\\phln\\collection\\contains';
const 𝑓contains = '\\phln\\collection\\𝑓contains';

/**
 * Returns `true` if the specified value is equal, `phln\relation\equals` terms,
 * to at least one element of the given collection; `false` otherwise.
 *
 * @phlnSignature a -> [a] -> Boolean
 * @phlnSignature String -> String -> Boolean
 * @phlnCategory collection
 * @param mixed $value
 * @param string|array $collection
 * @return \Closure|bool
 * @example
 *      \phln\collection\contains(1, [1, 2, 3]); // true
 *      \phln\collection\contains('foo', 'foobar'); // true
 */
function contains($value = nil, $collection = nil)
{
    return curryN(2, 𝑓contains, [$value, $collection]);
}

function 𝑓contains($value, $collection): bool
{
    $stringContains = partial('\\strstr', [__, $value]);
    $f = typeCond([
        ['array', any(equals($value))],
        ['string', both(T, $stringContains)],
        [otherwise, F]
    ]);

    return $f($collection);
}
