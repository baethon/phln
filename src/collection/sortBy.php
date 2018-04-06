<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\fn\curryN;

const sortBy = '\\phln\\collection\\sortBy';
const 𝑓sortBy = '\\phln\\collection\\𝑓sortBy';

/**
 * Sorts the list according to the supplied function.
 *
 * @phlnSignature (a -> b) -> [a] -> [a]
 * @phlnCategory collection
 * @param callable $mapper
 * @param array $list
 * @return \Closure|array
 * @see \array_multisort()
 * @example
 *      $alice = ['name' => 'alice'];
 *      $bob = ['name' => 'bob'];
 *      $clara = ['name' => 'clara'];
 *      $people = [$bob, $clara, $alice];
 *
 *      \phln\collection\soryBy(\phln\object\prop('name'), $people); // [$alice, $bob, $clara]
 */
function sortBy(callable $mapper = null, array $list = [])
{
    return curryN(2, 𝑓sortBy, func_get_args());
}

function 𝑓sortBy(callable $mapper, array $list): array
{
    $column = array_map($mapper, $list);
    array_multisort($column, \SORT_REGULAR, $list);

    return $list;
}
