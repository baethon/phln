<?php

declare(strict_types=1);

namespace Baethon\Phln;

const reject = 'Baethon\\Phln\\reject';

/**
 * @template T
 *
 * @param array<T>         $list
 * @param callable(T):bool $predicate
 *
 * @return array<T>
 */
function reject(array $list, callable $predicate): array
{
    return filter($list, negate($predicate));
}
