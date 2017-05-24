<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\pipe;
use function phln\fn\curry;
use const phln\fn\nil;

const flatMap = '\\phln\\collection\\flatMap';
const 𝑓flatMap = '\\phln\\collection\\𝑓flatMap';

/**
 * Maps a function over list and concatenates results
 *
 * @phlnSignature (a -> b) -> [a] -> [b]
 * @phlnCategory collection
 * @param string $mapper
 * @param string $list
 * @return \Closure|mixed
 * @example
 *      $duplicateElements = \phln\collection\flatMap(function ($i) {
 *          return [$i, $i];
 *      });
 *
 *      $duplicateElements([1, 2]); // [1, 1, 2, 2]
 */
function flatMap($mapper = nil, $list = nil)
{
    return curry(𝑓flatMap, $mapper, $list);
}

function 𝑓flatMap(callable $mapper, array $list): array
{
    $f = pipe(
        map($mapper),
        collapse
    );

    return $f($list);
}
