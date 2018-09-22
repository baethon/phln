<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\pipe;
use function phln\fn\curryN;

use const phln\object\values;

const partition = '\\phln\\collection\\partition';
const 𝑓partition = '\\phln\\collection\\𝑓partition';

/**
 * Takes a predicate and a collection and returns the pair of filterable objects of the same type of elements which do and do not satisfy, the predicate, respectively.
 *
 * @phlnSignature (a -> Bool) -> [a] -> [[a], [a]]
 * @phlnCategory collection
 * @param callable $predicate
 * @param array $collection
 * @return \Closure|array
 * @example
 *      \phln\collection\partition(
 *          \phln\collection\contains('foo'),
 *          ['foo bar', 'bar', 'foo']
 *      ); // [['foo bar', 'foo'], ['bar']]
 */
function partition(callable $predicate = null, array $collection = null)
{
    return curryN(2, 𝑓partition, func_get_args());
}

function 𝑓partition(callable $predicate, array $collection): array
{
    $f = pipe([
        reduce(
            function ($carry, $item) use ($predicate) {
                $key = $predicate($item)
                    ? 'left'
                    : 'right';

                return array_merge($carry, [
                    $key => append($item, $carry[$key]),
                ]);
            },
            ['left' => [], 'right' => []]
        ),
        values
    ]);

    return $f($collection);
}
