<?php

declare(strict_types=1);

namespace Baethon\Phln;

const reduce_while = 'Baethon\\Phln\\reduce_while';

/**
 * @param array<mixed>                                               $collection
 * @param callable(mixed, mixed, string):array{'halt'|'cont', mixed} $reducer
 * @param mixed                                                      $initialValue
 *
 * @return mixed
 */
function reduce_while(array $collection, callable $reducer, $initialValue = null)
{
    $carry = $initialValue;

    foreach ($collection as $key => $value) {
        [$op, $carry] = $reducer($carry, $value, $key);

        if ('halt' === $op) {
            return $carry;
        }
    }

    return $carry;
}
