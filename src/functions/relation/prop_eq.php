<?php

declare(strict_types=1);

namespace Baethon\Phln;

const prop_eq = 'Baethon\\Phln\\prop_eq';

/**
 * @param array<mixed>|object $object
 * @param string $prop
 * @param mixed $value
 * @return bool
 */
function prop_eq ($object, string $prop, $value): bool
{
    return pipe_first($object, [
        _(prop, $prop),
        _(equals, $value),
    ]);
}
