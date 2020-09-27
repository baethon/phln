<?php

declare(strict_types=1);

namespace Baethon\Phln;

const keys = 'Baethon\\Phln\\keys';

/**
 * @param object|array<string, mixed> $object
 *
 * @return array<string>
 */
function keys($object): array
{
    return pipe_first($object, [
        hashmap,
        '\array_keys'
    ]);
}
