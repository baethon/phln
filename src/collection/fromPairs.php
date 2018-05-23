<?php
declare(strict_types=1);

namespace phln\collection;

const fromPairs = '\\phln\\collection\\fromPairs';

/**
 * Creates a new key => value object from list of pairs.
 *
 * @phlnSignature [[k, v]] -> {k: v}
 * @phlnCategory collection
 * @param array $pairs
 * @return array
 * @example
 *      \phln\collection\fromPairs([['foo', 1], ['bar', 2]]); // [ 'foo' => 1, 'bar' => 2 ]
 */
function fromPairs(array $pairs): array
{
    return array_reduce(
        $pairs,
        function ($carry, $item) {
            list ($key, $value) = $item;

            return array_merge($carry, [$key => $value]);
        },
        []
    );
}
