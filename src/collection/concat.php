<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curry;
use const phln\fn\nil;

const concat = '\\phln\\collection\\𝑓concat';

/**
 * Returns the result of concatenating the given arrays or strings.
 *
 * @phlnSignature [a] -> [a] -> [a]
 * @phlnSignature String -> String -> String
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
    return curry(concat, $a, $b);
}

function 𝑓concat($a, $b)
{
    $uniqueTypes = array_unique(
        array_map('gettype', [$a, $b])
    );

    if (count($uniqueTypes) > 1) {
        throw new \InvalidArgumentException('Passed arguments need to have the same type');
    }

    switch ($uniqueTypes[0]) {
        case 'array':
            return array_merge($a, $b);
        case 'string':
            return "{$a}{$b}";
        default:
            throw new \InvalidArgumentException('Unsupported argument type');
    }
}
