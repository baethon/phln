<?php

declare(strict_types=1);

namespace Baethon\Phln;

const set = 'Baethon\\Phln\\set';

/**
 * @param object|array<mixed> $targetData
 * @param callable(object|array<mixed>, callable): mixed $lens
 * @param mixed $value
 * @return object|array<mixed>
 */
function set ($targetData, callable $lens, $value)
{
    return over($targetData, $lens, always($value));
}
