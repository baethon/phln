<?php

declare(strict_types=1);

namespace Baethon\Phln;

const reduce = 'Baethon\\Phln\\reduce';

/**
 * @param array<mixed>                 $list
 * @param callable(mixed, mixed):mixed $reducer
 * @param mixed                        $initialValue
 *
 * @return mixed
 * @psalm-pure
 */
function reduce(array $list, callable $reducer, $initialValue = null)
{
    return array_reduce($list, $reducer, $initialValue);
}
