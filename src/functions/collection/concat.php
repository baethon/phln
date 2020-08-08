<?php

declare(strict_types=1);

namespace Baethon\Phln;

const concat = 'Baethon\\Phln\\concat';

/**
 * @param mixed $left
 * @param mixed $right
 * @return array<mixed>|string
 * @throws \InvalidArgumentException
 * @psalm-immutable
 */
function concat ($left, $right) {
    if (is_array($left) && is_array($right)) {
        return array_merge($left, $right);
    }

    if (is_stringable($left) && is_stringable($right)) {
        /** @var string $left */
        /** @var string $right */
        return "{$left}{$right}";
    }

    throw new \InvalidArgumentException('Unsupported collection type');
}
