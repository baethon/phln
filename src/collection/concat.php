<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\nil;
use const phln\fn\otherwise;
use function phln\fn\{
    compose, curryN, throwException, unapply
};
use function phln\logic\cond;
use function phln\relation\equals;

const concat = '\\phln\\collection\\concat';
const 𝑓concat = '\\phln\\collection\\𝑓concat';

/**
 * Returns the result of concatenating the given lists or strings.
 *
 * Note: `\phln\collection\concat` expects both arguments to be of the same type, otherwise it will throw an exception.
 *
 * @phlnSignature [a] -> [a] -> [a]
 * @phlnSignature String -> String -> String
 * @phlnCategory collection
 * @param string|array $a
 * @param string|array $b
 * @return \Closure|string|array
 * @throws \InvalidArgumentException
 * @example
 *      \phln\collection\concat([1, 2], [3]); // [1, 2, 3]
 *      \phln\collection\concat('foo', 'bar'); // 'foobar'
 */
function concat($a = nil, $b = nil)
{
    return curryN(2, 𝑓concat, [$a, $b]);
}

function 𝑓concat($a, $b)
{
    $getTypes = unapply(map('\\gettype'));
    $matchesType = function (string $type) use ($getTypes) {
        return compose([equals([$type, $type]), $getTypes]);
    };

    $f = cond([
        [$matchesType('string'), curryN(3, '\\sprintf', ['%s%s'])],
        [$matchesType('array'), curryN(2, '\\array_merge')],
        [otherwise, throwException(\InvalidArgumentException::class, ['Passed arguments are not supported'])]
    ]);

    return $f($a, $b);
}
