<?php

declare(strict_types=1);

namespace Baethon\Phln;

const none = 'Baethon\\Phln\\none';

/**
 * @param array<mixed>         $list
 * @param callable(mixed):bool $predicate
 */
function none(array $list, callable $predicate): bool
{
    return all($list, negate($predicate));
}
